<?php

namespace App\Http\Controllers\Settings;

use App\Grid\Settings\UserGird;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UsersRequest;
use App\Models\Baseinfo;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Services\Html\ManagementColumn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use SrkGrid\GridView\Grid;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Illuminate\Http\JsonResponse as Json;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-users')->only('index');
        $this->middleware('permission:create-users')->only(['create', 'store']);
        $this->middleware(['permission:login-as-user'])->only(['loginAsUser']);
        $this->middleware(['required_ajax_request'])->only(['create']);
    }

    public function index(ManagementColumn $column)
    {
        $users = User::query()->with(['projects', 'roles'])
            ->where('id', '>', '1')->latest()
            ->paginate(30);

        return view('settings.users.index', compact('users'));
    }


    public function create(): Json
    {
        $roles = Role::query()->where('id', '>', 1)->get();
        $projects = Project::query()->get();
        $conditionRequest = Baseinfo::type('condition_request');
        $typeRequest = Baseinfo::type('type_request');


        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('settings.users.partials.create', compact(
                    'roles', 'projects', 'conditionRequest', 'typeRequest')
            )->render(),
        ]);
    }


    public function store(UsersRequest $request): Json
    {
        DB::beginTransaction();

        $accessRequest = [
            'status' => $request->status,
            'type' => $request->type,
        ];

        $user = User::query()->create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'access_request' => json_encode($accessRequest)
        ]);

        $user->assignRole($request->roles);

        $user->projects()->sync($request->project_id);


        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-store'), 'url' => route('users.index')
        ]);
    }

    public function edit($id)
    {
        $user = User::query()->find($id);
        $roles = Role::query()->where('id', '>', 1)->get();
        $projects = Project::query()->get();
        $conditionRequest = Baseinfo::type('condition_request');
        $typeRequest = Baseinfo::type('type_request');
        $userProject = $user->projects()->get()->pluck('id')->toArray();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'data' => view('settings.users.partials.edit', compact(
                    'roles', 'projects', 'conditionRequest', 'typeRequest', 'userProject', 'user')
            )->render()
        ]);
    }

    public function update(UsersRequest $request, $id): Json
    {
        DB::beginTransaction();

        $user = User::query()->find($id);

        $accessRequest = [
            'status' => $request->status,
            'type' => $request->type,
        ];

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'access_request' => json_encode($accessRequest)
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        if ($user->roles()->first()) {
            $user->removeRole($user->roles()->first()->name);
        }

        $user->assignRole($request->roles);

        $user->projects()->sync($request->project_id);

        DB::commit();

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'msg' => trans('message.success-update'),
            'url' => route('users.index')
        ]);
    }

    public function loginAsUser($id): RedirectResponse
    {
        auth()->logout();
        auth()->loginUsingId($id);

        return redirect()->route('dashboard');
    }
}
