<?php

namespace App\Http\Controllers;

use App\Models\Supply\Category;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __invoke(Request $request,DashboardService $dashboardService)
    {
        return view('dashboard',compact('dashboardService'));
    }
}
