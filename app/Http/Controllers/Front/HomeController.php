<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subjectCategories = Category::query()
            ->where('parent_id', '=', 0)
            ->where('type_id', '=', 3)
            ->get();

        return view('front.index', compact('subjectCategories'));
    }
}
