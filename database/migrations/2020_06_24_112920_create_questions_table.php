<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            //お問い合わせ内容(contentカラム)
            $table->string('content', 1000);
            //氏名(nameカラム)
            $table->string('name', 20);
            //会社名(companyカラム)
            $table->string('company', 20);
            //メアド(mailカラム)
            $table->string('email', 50);
            //電話番号(phoneカラム)
            $table->string('phone', 20);
            
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
        Schema::dropIfExists('questions');
    }
}
