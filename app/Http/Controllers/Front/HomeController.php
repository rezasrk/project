<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Journal;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subjectCategories = $this->categories();

        $publishers = $this->publishers();

        $journals = $this->journals();

        $creators = $this->creators();

        return view('front.index', compact(
            'subjectCategories','publishers',
            'journals','creators'
        ));
    }

    protected function categories()
    {
        return Category::query()
            ->where('parent_id', '=', 0)
            ->where('type_id', '=', 3)
            ->get();
    }

    protected function publishers()
    {
        return Publisher::query()
                ->with(['journals','journals','journals.articles'])
                ->where('status',1)
                ->limit(10)
                ->get();
    }

    protected function journals()
    {
        return Journal::query()
            ->with(['publish'=>function($query){
                $query->where('status',1);
            }])
            ->limit(10)
            ->get();
    }

    protected function creators()
    {
        return User::query()
            ->withCount(['articles as articleCount'])
            ->where('as_creator',1)
            ->limit(10)
            ->get();
    }
}
