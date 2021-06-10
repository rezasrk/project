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

    public function edit($id)
    {
        $tag = Tag::query()->findOrFail($id);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('tags.partials.edit', compact('tag'))->render(),
        ]);
    }

    public function update($id, TagRequest $request)
    {
        Tag::query()->find($id)->update(['title' => $request->input('title')]);

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-update')
        ]);
    }
}
