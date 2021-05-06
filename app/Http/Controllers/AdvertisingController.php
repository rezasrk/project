<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertising;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertisingController extends Controller
{
    public function index()
    {
        $advertisings = Advertising::query()->paginate(20);

        return view('advertising.index',compact('advertisings'));
    }

    public function create()
    {
        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'data'=>view('advertising.partials.create')->render(),
        ]);
    }

    public function store(AdvertisingRequest $request)
    {
        DB::beginTransaction();

        $advertising = Advertising::query()->create([
            'title'=>$request->input('title'),
            'link'=>$request->input('link'),
        ]);

        $path = $request->file('image')->store('advertising');

        $advertising->update(['path'=>$path]);

        DB::commit();

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-store')
        ]);
    }

    public function destroy($id)
    {
        Advertising::query()->find($id)->delete();

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-delete')
        ]);
    }
}
