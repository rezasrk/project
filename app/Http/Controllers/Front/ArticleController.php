<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::query()
                        ->with(['journal'])
                        ->withCount(['logDownload as downloadCount','logView as viewCount']);
                        
        $searchPlaceHolder = 'جستجو برای مقاله';

        if($request->query('sort')){
            $sort = explode('-',$request->query('sort'));
            $articles->orderByRaw($sort[0].' '.$sort[1]);

        }

        if($request->query('title')){
            $articles->where('title','like','%'.$request->query('title').'%');
        }

        $articles = $articles->paginate(20);
        return view('front.articles.index',compact('searchPlaceHolder','articles'));
    }

    public function download(Request $request)
    {
        DB::beginTransaction();

        ArticleLog::query()->insertOrIgnore([
            'article_id'=>$request->query('article_id'),
            'ip'=>$request->ip(),
            'log'=>'download_number',
            'created_at'=>now()
        ]);
        ArticleLog::query()->insertOrIgnore([
            'article_id'=>$request->query('article_id'),
            'ip'=>$request->ip(),
            'log'=>'view_number',
            'created_at'=>now()
        ]);
        $download = Storage::disk('public')->download($request->path);

        DB::commit();

        return $download ;
    }
}
