<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journal;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        $publish = Publisher::query()->count();
        $user = User::query()->count();
        $journal = Journal::query()->count();
        $article = Article::query()->count();

        return view('dashboard',compact('publish','user','journal','article'));
    }
}
