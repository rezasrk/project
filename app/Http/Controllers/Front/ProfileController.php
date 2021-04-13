<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\Front\InfoRequest;
use App\Http\Requests\Front\JournalRequest;
use App\Http\Requests\Front\PublisherRequest;
use App\Http\Requests\JournalNumberRequest;
use App\Models\Article;
use App\Models\Baseinfo;
use App\Models\Category;
use App\Models\Journal;
use App\Models\JournalNumber;
use App\Models\Publisher;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:front', 'verify_email']);
    }

    public function info()
    {
        $data = [
            'type' => 'info',
            'info' => auth()->guard('front')->user(),
            'degree' => Baseinfo::type('degree'),
            'scientific_rank' => Baseinfo::type('scientific_rank'),
        ];

        return view('front.profile.profile', $data);
    }


    protected function infoStore(InfoRequest $request): JsonResponse
    {
        auth('front')->user()->update([
            'name' => $request->input('name'),
            'degree' => $request->input('degree'),
            'website' => $request->input('website'),
            'email' => $request->input('email'),
            'as_creator'=>$request->has('as_creator')  ? :0
        ]);

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            auth()->user()->update(['image' => $imagePath]);
        }


        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store'),
        ]);
    }

    public function publisher(Request $request)
    {
        $data = [
            'type' => 'publisher',
            'publisher' => Publisher::query()
                ->where('creator_id', auth()->id())
                ->find($request->query('publisher_id')),
            'publishers' => Publisher::query()
                ->withCount('journals as journalCount')
                ->where('creator_id', auth()->id())
                ->paginate(20),
            'rank_requester' => Baseinfo::type('rank_requester'),
            'degree_publisher' => Baseinfo::type('degree_publisher'),
            'license_from' => Baseinfo::type('license_from'),
        ];
        return view('front.profile.profile', $data);
    }

    public function publisherStore(PublisherRequest $request): JsonResponse
    {
        $publisher = Publisher::query()->updateOrCreate([
            'id' => $request->publisher_id,
            'creator_id' => auth()->id()
        ], [
            'publisher_title' => $request->input('publisher_title'),
            'owner_publisher' => $request->input('owner_publisher'),
            'requester' => $request->input('requester'),
            'rank_requester' => $request->input('rank_requester'),
            'degree_publisher' => $request->input('degree_publisher'),
            'license_from' => $request->input('license_from'),
            'publisher_phone' => $request->input('publisher_phone'),
            'publisher_email' => $request->input('publisher_email'),
            'publisher_web_site' => $request->input('publisher_web_site'),
            'creator_id' => auth('front')->id()
        ]);
        if ($request->has('publisher_logo')) {
            $publisher_logo_path = $request->file('publisher_logo')->store('publisher', 'public');
            $publisher->update(['publisher_logo' => $publisher_logo_path]);
        }
        if ($request->has('publisher_license_image')) {
            $publisher_license_image_path = $request->file('publisher_license_image')->store('publisher', 'public');
            $publisher->update(['publisher_license_image' => $publisher_license_image_path]);
        }
        if ($request->has('publisher_letter')) {
            $publisher_letter_path = $request->file('publisher_letter')->store('publisher', 'public');
            $publisher->update(['publisher_letter' => $publisher_letter_path]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function journal(Request $request)
    {
        /** @var User $user */
        $user = auth('front')->user();
        $accessPublish = $user->publisher()->get()->pluck('id')->toArray();

        $data = [
            'type' => 'journals',
            'publishers' => Publisher::query()->where('creator_id', $user->id)->get(),
            'categories' => Category::query()->where('type_id', '=', 3)
                ->where('parent_id', '=', 0)
                ->get(),
            'degrees' => Baseinfo::type('degree_publisher'),
            'period_publisher' => Baseinfo::type('period_publisher'),
            'journals' => Journal::query()->with(['publish'])
                ->whereIn('publisher_id', $accessPublish)
                ->paginate(20),
            'journal' => Journal::query()
                ->whereIn('publisher_id', $accessPublish)
                ->find($request->query('journal_id')),
            'journalNumbers' => JournalNumber::query()->where('journal_id', $request->query('journal_id'))->get(),
            'numberJr' => JournalNumber::query()->find($request->query('journal_number')),
        ];

        return view('front.profile.profile', $data);
    }

    public function journalStore(JournalRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $journal = Journal::query()->updateOrCreate([
            'id' => $request->input('journal_id')
        ], [
            'journal_title' => $request->input('journal_title'),
            'publisher_id' => $request->input('publisher'),
            'category_id' => $request->input('category_id'),
            'degree' => $request->input('degree'),
            'period_journal' => $request->input('period_journal'),
            'about_journal' => $request->input('about_journal'),
            'owner_journal' => $request->input('owner_journal'),
            'manager' => $request->input('manager'),
            'chief_editor' => $request->input('chief_editor'),
            'editorial_board' => $request->input('editorial_board'),
            'p_issn' => $request->input('p_issn'),
            'e_issn' => $request->input('e_issn'),
            'post_code' => $request->input('post_code'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'creator_id' => auth()->id(),
        ]);

        if ($request->has('image')) {
            $path = $request->file('image')->store('journal', 'public');
            $journal->update(['image' => $path]);
        }

        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function journalNumberStore(JournalNumberRequest $request): JsonResponse
    {

        /** @var Journal $journal */

        $journal = Journal::query()->find($request->input('journal_id'));

        $journal->journalNumbers()->updateOrCreate(['id' => $request->journal_number_id, 'journal_id' => $request->journal_id], [
            'title' => $request->input('title'),
            'number' => $request->input('number'),
            'year' => $request->input('year')
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function article()
    {
        /** @var User $user */
        $user = auth('front')->user();
        $accessPublish = $user->publisher()->pluck('id')->toArray();
        /** @var Article $artic */
        $artic = Article::query()->find(request()->query('article_id'));

        $nexCategories = $artic->categories()->get();

        $data = [
            'type' => 'article',
            'articles' => Article::query()->paginate(20),
            'degrees' => Baseinfo::type('degree_article'),
            'journals' => Journal::query()->whereIn('publisher_id', $accessPublish)->get(),
            'writers' => User::query()->where('as_creator', 1)->get(),
            'tags' => Tag::query()->get(),
            'categories' => Category::query()
                ->where('parent_id', '=', 0)
                ->where('type_id', '3')
                ->get(),
            'artic' => $artic,
            'journal_number' => JournalNumber::query()->where('journal_id', $artic->journal_id)->get(),
            'selectWriters' => $artic->writers()->get()->pluck('id')->toArray(),
            'selectTags' => $artic->tags()->get()->pluck('id')->toArray()

        ];
        return view('front.profile.profile', $data);
    }


    public function articleStore(ArticleRequest $request): JsonResponse
    {
        DB::beginTransaction();

        /** @var Article $article */
        $article = Article::query()->create([
            'title' => $request->input('title'),
            'article_degree' => $request->input('article_degree'),
            'journal_id' => $request->input('journal_id'),
            'journal_number_id' => $request->input('journal_number_id'),
            'from_page' => $request->input('from_page'),
            'to_page' => $request->input('to_page'),
            'article_summery' => $request->input('article_summery'),
        ]);

        $article->writers()->sync($request->input('writers'));
        $article->tags()->sync($request->input('tags'));

        foreach ($request->input('category_first_id') as $key => $value) {
            $article->categories()->create([
                'category_first_id' => $value,
                'category_second_id' => $request->input('category_second_id.' . $key),
                'category_third_id' => $request->input('category_third_id.' . $key),
                'category_forth_id' => $request->input('category_forth_id.' . $key),
            ]);
        }

        $file = $request->file('attachment')->store('article', 'public');

        $article->attachments()->create(['path' => $file]);

        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

}
