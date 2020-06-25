<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNewSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_spots', function (Blueprint $table) {
            $table->string('address',100);
            $table->double('lat');
            $table->double('lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_spots', function (Blueprint $table) {
            $table->dropColumn(['address, lat, lng']);
        });
    }
}
