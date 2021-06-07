<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Services\Morilog\Morilog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index(Request $request, Morilog $morilog)
    {
        $publishers = Publisher::query();

        if ($request->query('publisher_title')) {
            $publishers->where('publisher_title', $request->query('publisher_title'));
        }

        if ($request->query('creator')) {
            $publishers->whereHas('creator', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query('creator') . '%');
            });
        }
        if ($request->query('email')) {
            $publishers->where('email', 'like', '%' . $request->query('email') . '%');
        }
        if ($request->query('phone')) {
            $publishers->where('phone', 'like', '%' . $request->query('phone') . '%');
        }

        if ($request->query('created_at')) {
            $publishers->whereDate('created_at', '=', $morilog->jalaliToGregorian($request->query('created_at')));
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

    public function edit($id)
    {
        $publisher = Publisher::query()->find($id);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('publishers.partials.edit', compact('publisher'))->render(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::query()->find($id);

        $publisher->update([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'web_site' => $request->input('web_site'),
            'about' => $request->input('about'),
        ]);

        if ($request->has('image')) {
            $image_path = $request->file('image')->store('publisher', 'public');
            $publisher->update(['image' => $image_path]);
        }
        if ($request->has('license')) {
            $license_path = $request->file('license')->store('publisher', 'public');
            $publisher->update(['license' => $license_path]);
        }
        if ($request->has('letter')) {
            $letter_path = $request->file('letter')->store('publisher', 'public');
            $publisher->update(['letter' => $letter_path]);
        }

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('success-update')
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
