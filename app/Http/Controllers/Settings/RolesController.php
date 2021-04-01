<?php

namespace App\Http\Controllers\Settings;

use App\Grid\Settings\PermissionsGrid;
use App\Grid\Settings\RolesGrid;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\RolesRequest;
use App\Models\Permission;
use App\Services\Html\ManagementColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Role;
use SrkGrid\GridView\Grid;
use Symfony\Component\HttpFoundation\JsonResponse;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:list-roles'])->only(['index']);
        $this->middleware(['permission:create-roles'])->only(['create', 'store']);
        $this->middleware(['permission:edit-roles'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManagementColumn $managementColumn
     * View
     */
    public function index(ManagementColumn $managementColumn)
    {
        $data = Role::query()->status(1);

        $grid = Grid::make(RolesGrid::class, $data, compact('managementColumn'));

        return view('settings.roles.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $permissions = Permission::query()->status()->orderBy('family');
        $grid = Grid::make(PermissionsGrid::class, $permissions);
        return view('settings.roles.form', compact('grid'));
    }

    /**
     * @param RolesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RolesRequest $request)
    {
        DB::beginTransaction();

        $role = Role::query()->create([
            'name' => $request->role_name,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $role->syncPermissions($request->permission);

        DB::commit();

        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.success-store'), 'url' => route('roles.index')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $permissions = Permission::query()->status()->orderBy('family');
        $roles = Role::query()->status()->findOrFail($id);

        $permissionsRole = $roles->permissions()->get()->pluck('id')->toArray();
        $grid = Grid::make(PermissionsGrid::class, $permissions, ['permissionsRole' => $permissionsRole]);

        return view('settings.roles.form', compact('grid', 'roles'));
    }

    /**
     * @param RolesRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RolesRequest $request, $id)
    {
        DB::beginTransaction();

        $roles = Role::query()->status()->findOrFail($id);

        $roles->update([
            'name' => $request->role_name,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $roles->syncPermissions($request->permission);

        DB::commit();

        return response()->json(['status' => JsonResponse::HTTP_OK, 'msg' => trans('message.success-update'), 'url' => route('roles.index')]);
    }
}
