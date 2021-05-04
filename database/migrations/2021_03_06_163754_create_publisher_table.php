<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePublisherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('address',500)->nullable();
            $table->boolean('status')->default(0);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('web_site')->nullable();
            $table->text('about')->nullable();
            $table->string('license',1000)->nullable();
            $table->string('letter',1000)->nullable();   
            $table->string('image',1000)->nullable(); 
            $table->integer('creator_id')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('publishers');
        DB::unprepared('SET FOREIGN_KEY_CHECKS=0;');
    }
}
