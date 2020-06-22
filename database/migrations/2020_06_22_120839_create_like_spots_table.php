<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_spots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('spot_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            // 外部キー
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_spots');
    }
}
