<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_spots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('anime_name',50);
            $table->string('anime_content',200);
            $table->string('spot_name',50);
            $table->string('spot_content',200);
            $table->string('spot_image',100);
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
        Schema::dropIfExists('add_spots');
    }
}
