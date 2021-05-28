<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Repository\AdvertisingRepository;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function index(Request $request, AdvertisingRepository $repo)
    {
        $users = User::query()
            ->withCount(['articles as articleCount'])
            ->whereHas('articles.categories', function ($query) use ($request) {
                if ($request->query('category_id')) {
                    $query->where('first_category', $request->query('category_id'));
                }

            })
            ->where('as_creator', 1);

        if ($request->query('sort')) {
            $sort = explode('-', $request->query('sort'));
            $users->orderByRaw($sort[0] . ' ' . $sort[1]);

        }

        if ($request->query('title')) {
            $users->where('name', 'like', '%' . $request->query('title') . '%');
        }

        $users = $users->paginate(20);

        $categories = Category::query()->withCount(['journals as journalCount'])
            ->where('parent_id', '=', 0)
            ->limit($request->query('limit_cat', 10))
            ->get();
        $searchPlaceHolder = 'جستجو در پدید آورندگان';

        $advertisings = $repo->repo();

        return view('front.creators.index', compact('users', 'searchPlaceHolder', 'categories', 'advertisings'));
    }

    public function show($id, AdvertisingRepository $repo, Request $request)
    {
        $user = User::query()->find($id);
        $articles = Article::query()->whereHas('writers', function ($query) use ($id) {
            $query->where('user_id', $id);
        });

        if ($request->query('title')) {
            $articles->where('title', 'like', '%' . $request->query('title') . '%');
        }

        $articles = $articles->paginate(20);

        $advertisings = $repo->repo();

        $searchPlaceHolder = 'جستجو مقالات';

        return view('front.creators.show', compact('user', 'advertisings', 'searchPlaceHolder', 'articles'));
    }
}
