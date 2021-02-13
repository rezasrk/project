<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supply\CategoriesRequest;
use App\Models\Baseinfo;
use App\Models\Supply\Category;
use App\Services\Html\Supply\CategoriesEditForm;
use App\Services\Html\Supply\CategoriesForm;
use App\Services\Html\Supply\CategoriesTreeView;
use App\Utilities\Supply\CategoriesCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Illuminate\Http\JsonResponse as Json;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:list-categories'])->only(['index']);
        $this->middleware(['permission:create-categories'])->only(['create', 'store']);
        $this->middleware(['permission:edit-categories'])->only(['edit', 'update']);
        $this->middleware(['required_ajax_request'])->except(['index']);
    }


    public function index(CategoriesTreeView $htmlCategory)
    {
        $data = Category::query()->where('category_parent_id', '=', request()->query('parent_id', 0))->get();
        $select = DB::table('request_details')->whereIn('category_id', $data->pluck('id')->toArray())->pluck('category_id')->toArray();

        $categories = $htmlCategory->html($data, $select);
        if (\request()->ajax()) {
            return response()->json(['status' => JsonResponse::HTTP_OK, 'data' => $categories]);
        }
        return view('supply.categories.index', compact('categories'));
    }


    public function create(Request $request): Json
    {
        $parent_id = $request->query('parent_id', 0);
        $units = Baseinfo::query()->type('equipment_unit');
        $disciplines = Baseinfo::query()->type('discipline');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.categories.partials.create', compact('parent_id', 'units', 'disciplines'))->render(),
            'title' => trans('title.create-category')
        ], JsonResponse::HTTP_OK);
    }


    public function store(CategoriesRequest $request, CategoriesCode $code): Json
    {
        $data = [];

        collect($request->category_title)->each(function ($value, $index) use (&$data, $request, $code) {
            $data [] = [
                'category_title' => $value,
                'code' => $code->code(count($request->category_title))[$index],
                'category_parent_id' => $request->category_parent_id,
                'discipline_id' => $request->discipline_id[$index] != "" ? $request->discipline_id[$index] : 46,
                'unit_id' => $request->unit_id[$index] != "" ? $request->unit_id[$index] : 46,
                'project_id' => projectInf()->id,
                'is_product' => isset($request->is_product[$index]) ?: 0,
                'created_at' => now()
            ];
        });

        Category::query()->insert($data);
        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store'),
            'url' => $request->category_parent_id[0] == 0 ? route('categories.index') : ''
        ]);
    }


    public function edit(Request $request, $id)
    {
        $units = Baseinfo::query()->type('equipment_unit');
        $disciplines = Baseinfo::query()->type('discipline');

        $category = Category::query()->findOrFail($id);

        return response()
            ->json([
                'status' => JsonResponse::HTTP_OK,
                'data' => view('supply.categories.partials.edit', compact(
                        'units', 'disciplines', 'category')
                )->render()
            ]);
    }


    public function update(CategoriesRequest $request, $id)
    {
        DB::beginTransaction();

        $result = Category::query()->findOrFail($id);
        $result->update([
            'category_title' => $request->category_title,
            'discipline_id' => $request->get('discipline_id', 46),
            'unit_id' => $request->get('unit_id', 46),
            'is_product' => isset($request->is_product) ?: 0,
        ]);

        DB::commit();
        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-update'),
        ]);
    }

    public function unit(Request $request)
    {
        $category = Category::query()->findOrFail($request->id);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => optional($category->unit)->value
        ]);
    }
}
