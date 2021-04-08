<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JournalNumber;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function captcha()
    {
        if (request()->ajax()) {
            return captcha_img();
        }
    }


    public function getJournalNumbers(Request $request): JsonResponse
    {
        $data = JournalNumber::query()
            ->where('journal_id', $request->query('journal_id'))
            ->get()
            ->pluck('title', 'id');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('partials.options', compact('data'))->render()
        ]);
    }

    public function getCategoryChild(Request $request): JsonResponse
    {
        $data = Category::query()
            ->where('parent_id', '=', $request->parent_id)
            ->get()
            ->pluck('title', 'id');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('partials.options', compact('data'))->render()
        ]);
    }
}
