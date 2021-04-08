<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()->paginate(20);

        return view('tags.index', compact('tags'));
    }

    public function store(TagRequest $request): JsonResponse
    {
        Tag::query()->create(['title' => $request->input('title')]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }
}
