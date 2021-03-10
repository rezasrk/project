<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers = Publisher::query()->with(['rankRequester']);

        if($request->filled('publisher_title')){
            $publishers->where('publisher_title',$request->query('publisher_title'));
        }
        $publishers = $publishers->paginate(20);

        return view('publishers.index', compact('publishers'));
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
