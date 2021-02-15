<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionTitle = config('labels');
        DB::unprepared('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'settings-menu',
                'title' => $permissionTitle['settings-menu'],
                'family' => 'setting',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => 'roles-menu',
                'title' => $permissionTitle['roles-menu'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => 'list-roles',
                'title' => $permissionTitle['list-roles'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 4,
                'name' => 'create-roles',
                'title' => $permissionTitle['create-roles'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 5,
                'name' => 'edit-roles',
                'title' => $permissionTitle['edit-roles'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 14,
                'name' => 'admins-menu',
                'title' => $permissionTitle['admins-menu'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 15,
                'name' => 'list-admins',
                'title' => $permissionTitle['list-admins'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 16,
                'name' => 'create-admins',
                'title' => $permissionTitle['create-admins'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 17,
                'name' => 'categories-menu',
                'title' => $permissionTitle['categories-menu'],
                'family' => 'category',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 18,
                'name' => 'list-categories',
                'title' => $permissionTitle['list-categories'],
                'family' => 'category',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 19  ,
                'name' => 'create-categories',
                'title' => $permissionTitle['create-categories'],
                'family' => 'category',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 20  ,
                'name' => 'edit-categories',
                'title' => $permissionTitle['edit-categories'],
                'family' => 'category',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
        ]);
        DB::unprepared('SET FOREIGN_KEY_CHECKS=1;');
    }
}
