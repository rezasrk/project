<?php

namespace App\Http\Controllers\Supply;

use App\Grid\Supply\RequestDetailGrid;
use App\Http\Controllers\Controller;
use App\Models\Baseinfo;
use App\Models\Supply\Category;
use Illuminate\Http\Request;
use \App\Models\Supply\Request as RQ;
use App\Models\Supply\RequestDetail;
use App\Services\Html\ManagementColumn;
use Illuminate\Http\JsonResponse;
use SrkGrid\GridView\Grid;

class RequestDetailsController extends Controller
{
    public function index(Request $request, ManagementColumn $column)
    {
        $data = RequestDetail::query()
            ->where('request_id', '=', $request->request_id)
            ->with(['category', 'MRS', 'MIV', 'MRV']);

        $unitPrice = Baseinfo::query()->type('money_unit');


        $grid = Grid::make(RequestDetailGrid::class, $data, compact('column', 'unitPrice'));

        return response()->json(['status' => JsonResponse::HTTP_OK, 'data' => $grid]);
    }


    public function store(RQ $rq, Request $request): void
    {
        collect($request->input('category_id'))->each(function ($category, $index) use ($rq, $request) {
            $rq->details()->updateOrCreate(['id' => $request->input('request_detail_id.' . $index)], [
                'category_id' => $category,
                'amount' => $request->input('amount.' . $index),
                'description' => $request->input('description.' . $index),
            ]);
        });
    }


    public function update(RQ $rq, Request $request)
    {
        $this->store($rq, $request);
    }
}
