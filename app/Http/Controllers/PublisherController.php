<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $journals = Journal::query()->with(['rankRequester']);

        if($request->filled('journal_title')){
            $journals->where('journal_title',$request->query('journal_title'));
        }
        $journals = $journals->paginate(20);

        return view('journals.index', compact('journals'));
    }

    public function accept(Request $request)
    {
        DB::beginTransaction();
        Journal::query()
            ->findOrFail($request->input('id'))
            ->update(['status' => 1]);
        DB::commit();
    }

    public function normal(Request $request)
    {
        DB::beginTransaction();
        Journal::query()
            ->findOrFail($request->input('id'))
            ->update(['status' => 0]);
        DB::commit();
    }
}
