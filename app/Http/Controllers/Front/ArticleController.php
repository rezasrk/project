<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleLog;
use App\Models\Journal;
use App\Repository\AdvertisingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Request $request, AdvertisingRepository $repo)
    {
        $articles = Article::query()
            ->with(['journal'])
            ->where('journal_id', $request->query('journal_id'))
            ->where('journal_number_id', $request->query('num'))
            ->withCount(['logDownload as downloadCount', 'logView as viewCount']);

        $journal = Journal::query()->find($request->query('journal_id'));
        $years = $journal->years()->limit(request()->query('limit', 10))->get();
        $searchPlaceHolder = 'جستجو برای مقاله';
        $advertisings = $repo->repo();

        if ($request->query('sort')) {
            $sort = explode('-', $request->query('sort'));
            $articles->orderByRaw($sort[0] . ' ' . $sort[1]);

        }

        if ($request->query('title')) {
            $articles->where('title', 'like', '%' . $request->query('title') . '%');
        }

        $articles = $articles->latest()->paginate(20);

        return view('front.articles.index', compact('searchPlaceHolder', 'articles', 'advertisings', 'journal', 'years'));
    }

    public function show($id, Request $request, AdvertisingRepository $repo)
    {
        /** @var Article $article */
        $article = Article::query()->findOrFail($id);
        $journal = Journal::query()->findOrFail($request->query('journal_id'));
        $years = $journal->years()->limit(request()->query('limit', 10))->get();
        $advertisings = $repo->repo();
        $writers = $article->writers()->get();
        $num = $journal->journalNumbers()->limit(10)->get();
        $tags = $article->tags()->get();
        $categories = $article->categories()->get();

        return view('front.articles.show', compact(
            'years', 'advertisings', 'article', 'journal', 'writers', 'num', 'tags', 'categories'
        ));
    }

    public function download(Request $request)
    {
        DB::beginTransaction();

        ArticleLog::query()->insertOrIgnore([
            'article_id' => $request->query('article_id'),
            'ip' => $request->ip(),
            'log' => 'download_number',
            'created_at' => now()
        ]);
        ArticleLog::query()->insertOrIgnore([
            'article_id' => $request->query('article_id'),
            'ip' => $request->ip(),
            'log' => 'view_number',
            'created_at' => now()
        ]);
        $download = Storage::disk('public')->download($request->path);

        DB::commit();

        return $download;
    }
}
