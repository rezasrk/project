<?php

namespace App\Http\Controllers\Settings;

use App\Grid\Settings\UserGird;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\AdminRequest;
use App\Models\Baseinfo;
use App\Models\Project;
use App\Models\Role;
use App\Models\Admin;
use App\Services\Html\ManagementColumn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use SrkGrid\GridView\Grid;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Illuminate\Http\JsonResponse as Json;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-admins')->only('index');
        $this->middleware('permission:create-admins')->only(['create', 'store']);
    }

    public function index(ManagementColumn $column)
    {
        $users = Admin::query()->with(['roles'])
            ->where('id', '>', '1')->latest()
            ->paginate(30);

        return view('settings.admins.index', compact('users'));
    }


    public function create(): Json
    {
        $roles = Role::query()->where('id', '>', 1)->get();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('settings.admins.partials.create', compact('roles'))->render(),
        ]);
    }


    public function store(AdminRequest $request): Json
    {
        DB::beginTransaction();

        $user = Admin::query()->create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);

        $user->assignRole($request->roles);

        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store'),
        ]);
    }

    public function edit($id)
    {
        $user = Admin::query()->find($id);
        $roles = Role::query()->where('id', '>', 1)->get();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('settings.admins.partials.edit', compact(
                    'roles', 'user')
            )->render()
        ]);
    }

    public function update(AdminRequest $request, $id): Json
    {
        DB::beginTransaction();

        $user = Admin::query()->find($id);

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        if ($user->roles()->first()) {
            $user->removeRole($user->roles()->first()->name);
        }

        $user->assignRole($request->roles);


        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-update'),
        ]);
    }


}
