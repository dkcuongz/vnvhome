<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->longText('path');
            $table->tinyInteger('post_id')->default(0);
            $table->tinyInteger('banner_id')->default(0);
            $table->tinyInteger('people_id')->default(0);
            $table->tinyInteger('system_id')->default(0);
            $table->tinyInteger('category_id')->default(0);
            $table->tinyInteger('new_id')->default(0);
            $table->tinyInteger('customer_care_id')->default(0);
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
        Schema::dropIfExists('images');
    }
}
