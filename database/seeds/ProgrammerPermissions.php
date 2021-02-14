<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
use \Spatie\Permission\Models\Permission;
use App\Models\Admin;

class ProgrammerPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::query()->find(1);
        $role = Role::query()->find(1);
        $user->assignRole($role->name);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
    }
}
