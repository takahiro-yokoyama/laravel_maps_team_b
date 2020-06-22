<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('anime_id');
            $table->unsignedBigInteger('location_id');
            $table->string('spot_name',50);
            $table->string('spot_content',200);
            $table->string('spot_image',100);
            $table->string('business_name',50);
            $table->string('business_time',100);
            $table->integer('price');
            $table->string('business_content',200);
            $table->string('business_image',100);
            $table->timestamps();
            //外部キー
            $table->foreign('anime_id')->references('id')->on('animes')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spots');
    }
}
