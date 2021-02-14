<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \App\Models\Supply\Request;

class BaseinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('baseinfos')->where('id', '<=', 10000)->delete();
         DB::table('baseinfos')->insert([
             [
                 'id' => 1,
                 'type' => 'default',
                 'value' => '---',
                 'parent_id' => 0,
                 'user_can_add' => 0,
                 'user_can_view' => 0,
                 'extra_value' => '',
             ],
             [
                 'id' => 2,
                 'type' => 'categoryType',
                 'value' => 'نوع دسته بندی',
                 'parent_id' => 0,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 3,
                 'type' => 'categoryType',
                 'value' => 'موضوعی',
                 'parent_id' => 2,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
         ]);
        DB::unprepared("SET FOREIGN_KEY_CHECKS=1;");
        DB::unprepared("ALTER TABLE baseinfos AUTO_INCREMENT = 10000");
    }
}
