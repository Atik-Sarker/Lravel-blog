<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appearances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->default('images/default-logo.jpg');
            $table->string('banner_header')->default('images/header-default-banner.jpg');
            $table->string('banner_sidebar')->default('images/sidebar-default-banner.jpg');
            $table->string('banner_footer')->default('images/footer-default-banner.jpg');
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
        Schema::dropIfExists('appearances');
    }
}
