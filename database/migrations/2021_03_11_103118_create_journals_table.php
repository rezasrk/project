<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('journal_title')->nullable();
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('degree');
            $table->unsignedBigInteger('period_journal');
            $table->text('about_journal');
            $table->string('owner_journal')->nullable();
            $table->string('manager')->nullable();
            $table->string('chief_editor')->nullable();
            $table->string('editorial_board')->nullable();
            $table->string('p_issn')->nullable();
            $table->string('e_issn')->nullable();
            $table->string('post_code')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->boolean('status')->default(0);


            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('degree')->references('id')->on('baseinfos');
            $table->foreign('period_journal')->references('id')->on('baseinfos');
            $table->foreign('creator_id')->references('id')->on('users');

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
        Schema::dropIfExists('journals');
    }
}
