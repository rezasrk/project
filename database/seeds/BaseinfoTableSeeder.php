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
             [
                 'id' => 4,
                 'type' => 'degree',
                 'value' => 'مدرک تحصیلی',
                 'parent_id' => 0,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 5,
                 'type' => 'degree',
                 'value' => 'دیپلم',
                 'parent_id' => 4,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 6,
                 'type' => 'degree',
                 'value' => 'فوق دیپلم',
                 'parent_id' => 4,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 7,
                 'type' => 'degree',
                 'value' => 'کارشناسی',
                 'parent_id' => 4,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 8,
                 'type' => 'degree',
                 'value' => 'کارشناسی ارشد',
                 'parent_id' => 4,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 9,
                 'type' => 'degree',
                 'value' => 'دکتری',
                 'parent_id' => 4,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 10,
                 'type' => 'scientific_rank',
                 'value' => 'رتبه ی علمی',
                 'parent_id' => 0,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 11,
                 'type' => 'scientific_rank',
                 'value' => 'رتبه ی شماره 1',
                 'parent_id' => 10,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
             [
                 'id' => 12,
                 'type' => 'scientific_rank',
                 'value' => 'رتبه ی شماره 2',
                 'parent_id' => 10,
                 'user_can_add' => 1,
                 'user_can_view' => 1,
                 'extra_value' => '',
             ],
         ]);
        DB::unprepared("SET FOREIGN_KEY_CHECKS=1;");
        DB::unprepared("ALTER TABLE baseinfos AUTO_INCREMENT = 10000");
    }
}
