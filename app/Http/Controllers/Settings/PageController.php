<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $about = Setting::query()->where('key', 'about')->first();
        $rule = Setting::query()->where('key', 'rule')->first();

        return view('settings.page', compact('about', 'rule'));
    }

    public function store(Request $request): JsonResponse
    {
        DB::table('settings')->where('key', 'about')
            ->update(['value' => $request->input('about')]);

        DB::table('settings')->where('key', 'rule')
            ->update(['value' => $request->input('rule')]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }
}
