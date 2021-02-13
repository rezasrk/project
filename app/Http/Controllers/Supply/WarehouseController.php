<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supply\MivRequest;
use App\Models\Baseinfo;
use App\Models\Shop;
use App\Models\Supply\Category;
use App\Models\Supply\RequestDetail;
use App\Models\Supply\StoreDetail;
use App\Repository\WarehouseRepository;
use App\Services\Morilog\Morilog;
use Illuminate\Http\JsonResponse as Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-warehouse')->only('warehouse');
    }

    public function warehouse(Request $request, WarehouseRepository $repository)
    {
        $warehouse = $repository->filter($request)->paginate(30);

        if ($request->ajax()) {
            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'data' => view('supply.warehouse.partials.warehouse', compact('warehouse'))->render()
            ]);
        }

        return view('supply.warehouse.index', compact('warehouse'));
    }

    public function mrsShow($requestId): Json
    {
        $details = RequestDetail::query()
            ->where('request_id', '=', $requestId)
            ->with(['category', 'MRS'])
            ->paginate(30);

        $units = Baseinfo::type('money_unit');

        $shops = Shop::query()->get();


        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.warehouse.partials.mrs', compact(
                    'details', 'units', 'shops')
            )->render()
        ]);
    }

    public function mrs(Request $request, Morilog $morilog)
    {
        DB::beginTransaction();

        /** @var RequestDetail $detail */
        $detail = RequestDetail::query()->findOrFail($request->request_detail_id);

        $detail->MRS()->delete();

        collect($request->amount)->each(function ($amount, $index) use ($request, $morilog) {
            $amount = str_replace(',', '', $amount);
            if ($amount > 0) {

                StoreDetail::query()->create([
                    'category_id' => $request->category_id,
                    'request_detail_id' => $request->request_detail_id,
                    'shop_id' => $request->input('shop_id.' . $index, 1),
                    'type' => 'MRS',
                    'amount' => $amount,
                    'project_id' => projectInf()->id,
                    'request_detail_no' => $request->input('request_detail_no.' . $index),
                    'price' => $request->input('price.' . $index) ? str_replace(',', '', $request->input('price.' . $index)) : 0,
                    'unit_price' => $request->input('unit_price.' . $index),
                    'date' => $morilog->jalaliToGregorian($request->input('date.' . $index)),
                    'description' => $request->input('description.' . $index),
                    'creator_id' => auth()->id(),
                    'extra' => $this->extraValue($request, $index)
                ]);
            }
        });

        DB::commit();

    }

    public function showMiv(Request $request, int $categoryId, int $requestId = 0): Json
    {
        $mivs = StoreDetail::query()
            ->where('category_id', '=', $categoryId)
            ->where('type', '=', 'MIV')
            ->orderBy('date', 'asc')
            ->paginate(30);

        $storeDetail = null;
        if ($request->store_detail) {
            $storeDetail = StoreDetail::query()->findOrFail($request->store_detail);
        }

        $category = Category::query()->findOrFail($categoryId);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.warehouse.partials.miv', compact(
                    'mivs', 'category', 'requestId', 'storeDetail'
                )
            )->render(),
        ]);
    }

    public function miv(MivRequest $request, Morilog $morilog): Json
    {
        StoreDetail::query()->updateOrCreate(['id' => $request->store_detail_id], [
            'type' => 'miv',
            'category_id' => $request->category_id,
            'request_detail_no' => $request->request_detail_no,
            'project_id' => projectInf()->id,
            'amount' => $request->amount,
            'date' => $morilog->jalaliToGregorian($request->date),
            'description' => $request->description,
            'creator_id' => auth()->id()
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function showMrv(Request $request, int $categoryId): Json
    {
        $mrvs = StoreDetail::query()
            ->where('category_id', '=', $categoryId)
            ->where('type', '=', 'MRV')
            ->orderBy('date', 'asc')
            ->paginate(30);

        $storeDetail = null;
        if ($request->store_detail) {
            $storeDetail = StoreDetail::query()->findOrFail($request->store_detail);
        }

        $category = Category::query()->findOrFail($categoryId);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('supply.warehouse.partials.mrv', compact('mrvs', 'category', 'storeDetail'))->render()
        ]);

    }

    public function mrv(MivRequest $request, Morilog $morilog)
    {
        StoreDetail::query()->updateOrCreate(['id' => $request->store_detail_id], [
            'type' => 'mrv',
            'category_id' => $request->category_id,
            'request_detail_no' => $request->request_detail_no,
            'project_id' => projectInf()->id,
            'amount' => $request->amount,
            'date' => $morilog->jalaliToGregorian($request->date),
            'description' => $request->description,
            'creator_id' => auth()->id()
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }


    private function extraValue(Request $request, $index)
    {
            return json_encode([
                'extra_a' => $request->input('extra_a.'.$index),
                'extra_b' => $request->input('extra_b.'.$index),
                'extra_c' => $request->input('extra_c.'.$index)
            ]);

    }
}
