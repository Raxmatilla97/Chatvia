<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineKursUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_kurs_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();         
            $table->integer('kurs_id')->unsigned();   
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kurs_id')->references('id')->on('online_video_dars');
            $table->primary(['user_id', 'kurs_id']);

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
        Schema::dropIfExists('online_kurs_user');
    }
}
