<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UserRequest;
use App\Models\Baseinfo;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->query('name')) {
            $users->where('name', 'like', '%' . $request->query('name') . '%');
        }

        if ($request->query('email')) {
            $users->where('email', 'like', '%' . $request->query('email') . '%');
        }

        if ($request->query('username')) {
            $users->where('username', 'like', '%' . $request->query('username') . '%');
        }
        if ($request->query('degree')) {
            $users->where('degree', '=', $request->query('degree'));
        }
        if ($request->query('rank')) {
            $users->where('scientific_rank', '=', $request->query('rank'));
        }
        if ($request->query('website')) {
            $users->where('website', 'like', '%' . $request->query('website') . '%');
        }
        $degrees = Baseinfo::type('degree');
        $rank = Baseinfo::type('scientific_rank');
        $users = $users->paginate(20);
        return view('users.index', compact(
                'users', 'degrees', 'rank'
            )
        );
    }

    public function create()
    {
        $degrees = Baseinfo::type('degree');

        $rank = Baseinfo::type('scientific_rank');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('users.partials.create', compact(
                'rank', 'degrees'))->render(),
        ]);
    }

    public function store(UserRequest $request)
    {
        User::query()->create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'degree' => $request->input('degree') ? $request->input('degree') : 1,
            'scientific_rank' => $request->input('rank') ? $request->input('rank') : 1,
            'password'=>bcrypt($request->input('password',1234))
        ]);

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store')
        ]);
    }

    public function edit($id)
    {
        $user = User::query()->find($id);

        $degrees = Baseinfo::type('degree');

        $rank = Baseinfo::type('scientific_rank');

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('users.partials.edit', compact(
                'user', 'rank', 'degrees'))->render()
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();

        User::query()->find($id)->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'degree' => $request->input('degree') ? $request->input('degree') : 1,
            'scientific_rank' => $request->input('rank') ? $request->input('rank') : 1,
        ]);

        if ($request->input('password')) {
            User::query()->find($id)->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-update')
        ]);
    }


    public function preview($id, Request $request)
    {
        $user = User::query()->find($id);

        if ($request->input('preview') == 1) {
            $user->update(['preview' => now()]);
        } else {
            $user->update(['preview' => null]);
        }
    }
}
