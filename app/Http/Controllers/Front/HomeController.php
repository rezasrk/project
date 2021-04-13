<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subjectCategories = $this->categories();

        $publishers = $this->publishers();

       
        return view('front.index', compact('subjectCategories','publishers'));
    }

    public function categories()
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
}
