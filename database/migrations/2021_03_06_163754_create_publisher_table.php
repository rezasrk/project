<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('publisher_title')->nullable();
            $table->string('owner_publisher')->nullable();
            $table->string('requester')->nullable();
            $table->string('publisher_phone')->nullable();
            $table->string('publisher_email')->nullable();
            $table->string('publisher_logo')->nullable();
            $table->string('publisher_license_image')->nullable();
            $table->string('publisher_letter')->nullable();
            $table->string('publisher_web_site')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('rank_requester');
            $table->unsignedBigInteger('degree_publisher');
            $table->unsignedBigInteger('license_from');

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('rank_requester')->references('id')->on('baseinfos');
            $table->foreign('degree_publisher')->references('id')->on('baseinfos');
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
        Schema::dropIfExists('publishers');
    }
}
