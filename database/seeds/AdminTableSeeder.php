<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insertOrIgnore([
            [
                'id' => 1,
                'email' => 'programmer@programmer.com',
                'username' => 'programmer',
                'name' => 'programmer',
                'password' => bcrypt('programmer!@#09857')
            ]
        ]);
    }
}
