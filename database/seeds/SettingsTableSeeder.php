<?php

use Illuminate\Database\Seeder;
use  \Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insertOrIgnore([
            [
                'key' => 'start_project',
                'value' => now()->timestamp
            ],
            [
                'key'=>'limit_complete_tile_recursive',
                'value'=>13,
            ],
            [
                'key'=>'show_unit_requester',
                'value'=>'false',
            ]
        ]);
    }
}
