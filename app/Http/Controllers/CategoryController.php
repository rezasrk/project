<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Baseinfo;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Illuminate\Http\JsonResponse as Json;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-categories')->only(['index']);
        $this->middleware('permission:create-categories')->only(['create', 'store']);
        $this->middleware('permission:edit-categories')->only(['edit', 'update']);
    }

    public function index()
    {
        $categories = Category::query()
            ->with(['type', 'parent'])
            ->latest()
            ->paginate(30);

        return view('categories.index', compact('categories'));
    }

    public function create(): Json
    {
        $types = Baseinfo::type('categoryType');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('categories.partials.create', compact('types'))->render(),
        ]);
    }

    public function store(CategoryRequest $request): Json
    {
        Category::query()->create([
            'title' => $request->input('title'),
            'parent_id' => $request->input('parent_id') ?: 0,
            'type_id' => $request->input('type_id')
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function edit(int $id): Json
    {
        $category = Category::query()->findOrFail($id);

        $types = Baseinfo::type('categoryType');

        $parents = Category::query()
            ->where('parent_id', '=', '0')
            ->where('type_id', '=', $category->type_id)
            ->get();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('categories.partials.edit', compact('category', 'types', 'parents'))->render(),
        ]);
    }

    public function update($id, CategoryRequest $request): Json
    {
        $category = Category::query()->findOrFail($id);

        $category->update([
            'title' => $request->input('title'),
            'parent_id' => $request->input('parent_id', 0),
            'type_id' => $request->input('type_id')
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-update')
        ]);
    }

    public function getParentCategory(Request $request): Json
    {
        $data = Category::query()
            ->where('type_id', '=', $request->query('type_id'))
            ->where('parent_id', '=', 0)
            ->get()
            ->pluck('title', 'id');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('partials.options', compact('data'))->render()
        ]);
    }
}
