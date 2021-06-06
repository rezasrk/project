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

        $users = $users->paginate(20);
        return view('users.index', compact('users'));
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
                'password'=>bcrypt($request->input('password'))
            ]);
        }

        DB::commit();

        return response()->json([
            'status'=>JsonResponse::HTTP_OK,
            'msg'=>trans('message.success-update')
        ]);
    }
}
