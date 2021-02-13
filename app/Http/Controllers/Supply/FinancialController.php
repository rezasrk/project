<?php

namespace App\Http\Controllers\Supply;

use App\Grid\Supply\FinancialGrid;
use App\Grid\Supply\RequestDetailGrid;
use App\Http\Controllers\Controller;
use App\Models\Supply\RequestDetail;
use App\Services\Html\ManagementColumn;
use Illuminate\Http\Request;
use SrkGrid\GridView\Grid;
use Symfony\Component\HttpFoundation\JsonResponse;

class FinancialController extends Controller
{
    public function index(Request $request,ManagementColumn $managementColumn)
    {
        $data = RequestDetail::query()->with(['category.unit'])->where('request_id', '=', $request->request_id);

        $grid = Grid::make(FinancialGrid::class, $data,compact('managementColumn'));

        return response()->json(['status'=>JsonResponse::HTTP_OK,'data'=>$grid]);
    }
}
