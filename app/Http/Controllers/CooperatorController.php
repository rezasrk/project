<?php

namespace App\Http\Controllers;

use App\Http\Requests\CooperatorRequest;
use App\Models\Baseinfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CooperatorController extends Controller
{
    public function index()
    {
        $cooperators = Baseinfo::query()
            ->where('type', 'cooperators')
            ->where('parent_id', '<>', 0)
            ->get();

        return view('cooperators.index', compact('cooperators'));
    }

    public function create(): JsonResponse
    {
        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('cooperators.partials.create')->render()
        ]);
    }

    public function store(CooperatorRequest $request): JsonResponse
    {
        $file = $request->file('file')->store('cooperator');

        Baseinfo::query()->create([
            'value' => $request->cooperator,
            'type' => 'cooperators',
            'parent_id' => 32,
            'extra_value' => json_encode([
                'url' => $file,
                'link'=>$request->link
            ])
        ]);

        return response()
            ->json([
                'status' => JsonResponse::HTTP_OK,
                'msg' => trans('message.success-store'),
            ]);
    }

    public function destroy($id): JsonResponse
    {
        Baseinfo::query()
            ->where('type', 'cooperators')
            ->where('parent_id', '<>', 0)
            ->find($id)->delete();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-delete')
        ]);
    }
}
