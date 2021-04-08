<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('article_degree');
            $table->unsignedBigInteger('journal_id');
            $table->unsignedBigInteger('journal_number_id');
            $table->string('from_page')->nullable();
            $table->string('to_page')->nullable();
            $table->text('article_summery')->nullable();

            $table->timestamps();

            $table->foreign('article_degree')->references('id')->on('baseinfos');
            $table->foreign('journal_id')->references('id')->on('journals');
            $table->foreign('journal_number_id')->references('id')->on('journal_numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
