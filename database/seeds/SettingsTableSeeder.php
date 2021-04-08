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
                'key' => 'about',
                'value' => 'جمله ی تستی'
            ],
            [
                'key' => 'rule',
                'value' => 'قوانین'
            ],
            [
                'key' => 'address',
                'value' => 'ادرس'
            ],
            [
                'key' => 'phone',
                'value' => '021'
            ],
            [
                'key' => 'mobile',
                'value' => '0912'
            ],
            [
                'key' => 'post_code',
                'value' => '32'
            ],
            [
                'key' => 'hours',
                'value' => ''
            ],
            [
                'key' => 'email',
                'value' => ''
            ],
        ]);
    }
}
