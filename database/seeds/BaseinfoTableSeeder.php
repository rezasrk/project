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
        // DB::table('baseinfos')->insert([]);
        DB::unprepared("SET FOREIGN_KEY_CHECKS=1;");
        DB::unprepared("ALTER TABLE baseinfos AUTO_INCREMENT = 10000");
    }
}
