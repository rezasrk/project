<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $description = Setting::query()->where('key', 'about')->first()->value;

        return view('front.about', compact('description'));
    }

    public function rule()
    {
        $description = Setting::query()->where('key', 'rule')->first()->value;

        return view('front.rule', compact('description'));
    }
}
