<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::query()->paginate(20);

        return view('journals.index', compact('journals'));
    }

    public function destroy($id)
    {
        Journal::query()->find($id)->delete();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-delete')
        ]);
    }
}
