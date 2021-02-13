<?php

namespace App\Http\Controllers\Supply;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supply\StoreDetailRequest;
use App\Models\Supply\RequestDetail;
use App\Models\Supply\StoreDetail;
use App\Services\Morilog\Morilog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreDetailController extends Controller
{
    public function store(StoreDetailRequest $request, Morilog $morilog)
    {
        DB::beginTransaction();

        $type = $request->type;


        $this->delete($request, $type);
        collect($request->amount)->each(function ($amount, $index) use ($request, $morilog, $type) {
            $amount = str_replace(',', '', $amount);
            if ($amount > 0) {
                StoreDetail::query()->create([
                    'category_id'=>$request->category_id[$index],
                    'type'=>$type,
                    'amount'=>$amount,
                    'project_id'=>projectInf()->id,
                    'request_detail_no'=>$request->request_detail_no[$index],
                    'price'=>str_replace(',', '', $request->price[$index]),
                    'unit_price'=>$request->unit_price[$index] == "" ? 0 : $request->unit_price[$index] == "",
                    'request_detail_id'=>$request->request_detail_id,
                    'date'=>$morilog->jalaliToGregorian($request->date[$index]),
                ]);
            }
        });

        DB::commit();
    }
    /**
     * Create financial store detail
     *
     * @param Request $request
     * @return void
     */
    public function price(Request $request)
    {
        RequestDetail::find($request->request_detail_id)->update(['price'=>$request->price]);
    }

    public function delete($request, $type)
    {
        RequestDetail::query()
        ->find($request->request_detail_id)
        ->$type()
        ->delete();
    }
}
