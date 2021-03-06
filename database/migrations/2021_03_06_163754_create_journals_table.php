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
            $table->string('owner_journal')->nullable();
            $table->string('requester')->nullable();
            $table->string('journal_phone')->nullable();
            $table->string('journal_email')->nullable();
            $table->string('journal_logo')->nullable();
            $table->string('journal_license_image')->nullable();
            $table->string('journal_letter')->nullable();
            $table->string('journal_web_site')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('rank_requester');
            $table->unsignedBigInteger('degree_journal');
            $table->unsignedBigInteger('license_from');

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('rank_requester')->references('id')->on('baseinfos');
            $table->foreign('degree_journal')->references('id')->on('baseinfos');
            $table->foreign('license_from')->references('id')->on('baseinfos');

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
