<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $description = Setting::query()->where('key', 'about')->first()->value;

        return view('front.about', compact('description'));
    }
}
