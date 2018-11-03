<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('youtube', 50)->nullable();
            $table->string('google', 50)->nullable();
            $table->string('twitter', 50)->nullable();
            $table->string('linkedin', 50)->nullable();

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
        Schema::dropIfExists('social_links');
    }
}
