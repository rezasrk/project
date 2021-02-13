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
                'id' => 6,
                'name' => 'request-menu',
                'title' => $permissionTitle['request-menu'],
                'family' => 'supply',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 7,
                'name' => 'list-categories',
                'title' => $permissionTitle['list-categories'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 8,
                'name' => 'create-categories',
                'title' => $permissionTitle['create-categories'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 9,
                'name' => 'edit-categories',
                'title' => $permissionTitle['edit-categories'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 13,
                'name' => 'transfer-category',
                'title' => $permissionTitle['transfer-category'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 14,
                'name' => 'users-menu',
                'title' => $permissionTitle['users-menu'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 15,
                'name' => 'list-users',
                'title' => $permissionTitle['list-users'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 16,
                'name' => 'create-users',
                'title' => $permissionTitle['create-users'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 17,
                'name' => 'list-requests',
                'title' => $permissionTitle['list-requests'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 18,
                'name' => 'list-action-request',
                'title' => $permissionTitle['list-action-request'],
                'family' => 'action',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 20,
                'name' => 'create-request',
                'title' => $permissionTitle['create-request'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 21,
                'name' => 'accept-requests',
                'title' => $permissionTitle['accept-requests'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 22,
                'name' => 'supply-requests',
                'title' => $permissionTitle['supply-requests'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 23,
                'name' => 'upload-document-requests',
                'title' => $permissionTitle['upload-document-requests'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 24,
                'name' => 'create-mrs',
                'title' => $permissionTitle['create-mrs'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 25,
                'name' => 'edit-request',
                'title' => $permissionTitle['edit-request'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 26,
                'name' => 'edit-request',
                'title' => $permissionTitle['edit-request'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 27,
                'name' => 'block-requests',
                'title' => $permissionTitle['block-requests'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 31,
                'name' => 'list-warehouse',
                'title' => $permissionTitle['list-warehouse'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 32,
                'name' => 'reject-requests',
                'title' => $permissionTitle['reject-requests'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 33,
                'name' => 'create-miv',
                'title' => $permissionTitle['create-miv'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 34,
                'name' => 'assign-request',
                'title' => $permissionTitle['assign-request'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 35,
                'name' => 'reports-menu',
                'title' => $permissionTitle['reports-menu'],
                'family' => 'report',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [

                'id' => 36,
                'name' => 'warehouse-report',
                'title' => $permissionTitle['warehouse-report'],
                'family' => 'report',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 38,
                'name' => 'print_request',
                'title' => $permissionTitle['print_request'],
                'family' => 'supply',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 39,
                'name' => 'dashboard',
                'title' => $permissionTitle['dashboard'],
                'family' => 'dashboard',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 40,
                'name' => 'current-project-request-count',
                'title' => $permissionTitle['current-project-request-count'],
                'family' => 'dashboard',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 41,
                'name' => 'all-project-request-count',
                'title' => $permissionTitle['all-project-request-count'],
                'family' => 'dashboard',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 42,
                'name' => 'send-requests',
                'title' => $permissionTitle['send-requests'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 43,
                'name' => 'unit-financial-request',
                'title' => $permissionTitle['unit-financial-request'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 44,
                'name' => 'supplied-requests',
                'title' => $permissionTitle['supplied-requests'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 45,
                'name' => 'login-as-user',
                'title' => $permissionTitle['login-as-user'],
                'family' => 'setting',
                'is_parent' => 0,
                'status' => 0,
                'guard_name' => 'web',
            ],
            [
                'id' => 46,
                'name' => 'supply-unfinished',
                'title' => $permissionTitle['supply-unfinished'],
                'family' => 'action',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 47,
                'name' => 'section-mrs',
                'title' => $permissionTitle['section-mrs'],
                'family' => 'mrs',
                'is_parent' => 1,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 48,
                'name' => 'extra-mrs',
                'title' => $permissionTitle['extra-mrs'],
                'family' => 'mrs',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 49,
                'name' => 'unit-money-mrs',
                'title' => $permissionTitle['unit-money-mrs'],
                'family' => 'mrs',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
            [
                'id' => 50,
                'name' => 'shop-mrs',
                'title' => $permissionTitle['shop-mrs'],
                'family' => 'mrs',
                'is_parent' => 0,
                'status' => 1,
                'guard_name' => 'web',
            ],
        ]);
        DB::unprepared('SET FOREIGN_KEY_CHECKS=1;');
    }
}
