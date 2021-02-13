<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Models\Supply\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Illuminate\Http\JsonResponse as Json;

class CategoriesTransferController extends Controller
{
    protected $counter = 0;

    public function __construct()
    {
        $this->middleware(['permission:transfer-category']);
        $this->middleware(['required_ajax_request']);
    }

    /*
     * Return html categories transfer form
     */
    public function transferForm(Request $request): Json
    {
        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.categories.partials.transfer')->render(),
        ]);
    }

    /*
     * Category Transfer
     */
    public function transfer(Request $request): Json
    {
        if (!$this->getParent($request->category_parent_id, $request->id)) {
            return response()->json([
                'status' => JsonResponse::HTTP_FORBIDDEN,
                'msg' => 'این انتقال قابل انجام نمی باشد ',
            ]);
        }

        if ($request->filled('id') && $request->filled('category_parent_id')) {
            Category::query()->whereIn('id', $request->id)
                ->update(['category_parent_id' => $request->category_parent_id]);

            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'msg' => trans('message.transfer-successful'),
            ]);
        }
    }

    private function getParent($parentId, $ids)
    {

        if (in_array($parentId, $ids)) {
            return false;
        }

        $this->counter += 1;

        if ($this->counter > 20) {
            return false;
        }

        $category = Category::query()->where('id', '=', $parentId)->first();

        if ($category->category_parent_id == 0) {
            return true;
        }

        return $this->getParent($category->category_parent_id, $ids);

    }
}
