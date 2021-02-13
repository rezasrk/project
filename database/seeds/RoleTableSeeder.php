<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'programmer',
                'status' => 0
            ]
        ]);
    }
}
