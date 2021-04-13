<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Guidance;
use Illuminate\Http\Request;

class GuidanceController extends Controller
{
    public function index()
    {
        $guidances = Guidance::query()->get();

        return view('front.guidance',compact('guidances'));
    }
}
