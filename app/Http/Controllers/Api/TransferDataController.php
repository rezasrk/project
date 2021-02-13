<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supply\Category;
use App\Models\Supply\RequestDetail;
use App\Models\Supply\StoreDetail;
use Illuminate\Http\Request;
use \App\Models\Supply\Request as RQ;

class TransferDataController extends Controller
{
    public function transfer(Request $request)
    {
        $this->storeRequest($request);
    }

    protected function storeRequest($request)
    {
        $rq = RQ::query()->create([
            'subject' => $request->subject,
            'code' => $request->code,
            'project_id' => $request->project_id,
            'unit_requester_id' => $request->unit_requester_id ? $request->unit_requester_id : 0,
            'applicant_name' => $request->applicant_name,
            'status' => $request->status,
            'type' => $request->type,
            'assign_id'=>$request->assign_id,
            'creator_id' => $request->creator_id,
            'created_at'=>$request->created_at
        ]);
        $this->storeRequestDetail($request, $rq);
        $this->storeFile($request, $rq);
    }

    protected function storeFile($request, $rq)
    {
        collect($request->file)->each(function ($file, $index) use ($rq, $request) {
            $path = $file->store('supply', 'public');
            $rq->attachments()->create([
                'title' => $request->input('type_file.' . $index),
                'path' => $path,
                'type' => $request->input('type_file.' . $index)
            ]);
        });


    }

    protected function storeRequestDetail($request, $rq)
    {
        collect($request->input('category_code'))->each(function ($categoryCode, $index) use ($rq, $request) {
            $category = Category::query()->where('code', $categoryCode)->first();
            if($request->filled('category_title')){
                //create new category by old panel parent_id
            }
            $detail = $rq->details()->create([
                'category_id' => $category->id,
                'amount' => $request->input('amount.' . $index),
                'description' => $request->input('description.' . $index),
            ]);
            $this->storeDetail($detail, $request, $category);
        });
    }

    protected function storeDetail($detail, $request, $category)
    {
        collect($request->input('warehouse_type'))->each(function ($warehouse, $index) use ($detail, $request, $category) {
            StoreDetail::query()->create([
                'request_detail_id' => $detail,
                'project_id' => 2,
                'type' => $warehouse,
                'request_detail_no' => $request->input('request_detail_no.' . $index),
                'category_id' => $category->id,
                'price' => $request->input('price.' . $index),
                'unit_price' => $request->input('unit_price.' . $index),
                'date' => $request->input('warehouse_date.' . $index),
                'description' => $request->input('description.' . $index),
                'extra' => [
                    'extra_a' => $request->input('extra_a.' . $index),
                    'extra_b' => $request->input('extra_b.' . $index),
                    'extra_c' => $request->input('extra_c.' . $index),
                ]
            ]);
        });

    }
}
