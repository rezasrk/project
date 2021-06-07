<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers = Publisher::query();

        if ($request->query('publisher_title')) {
            $publishers->where('publisher_title', $request->query('publisher_title'));
        }

        if ($request->query('creator')) {
            $publishers->whereHas('creator', function($query) use ($request){
                $query->where('name','like', '%' . $request->query('creator') . '%');
            });
        }
        if ($request->query('email')) {
            $publishers->where('email', 'like', '%' . $request->query('email') . '%');
        }
        if ($request->query('phone')) {
            $publishers->where('phone', 'like', '%' . $request->query('phone') . '%');
        }
        $publishers = $publishers->paginate(20);

        return view('publishers.index', compact('publishers'));
    }

    public function show($id)
    {
        $publisher = Publisher::query()->find($id);
        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('publishers.partials.show', compact('publisher'))->render(),
        ]);
    }

    public function accept(Request $request)
    {
        DB::beginTransaction();
        publisher::query()
            ->findOrFail($request->input('id'))
            ->update(['status' => 1]);
        DB::commit();
    }

    public function normal(Request $request)
    {
        DB::beginTransaction();
        Publisher::query()
            ->findOrFail($request->input('id'))
            ->update(['status' => 0]);
        DB::commit();
    }
}
