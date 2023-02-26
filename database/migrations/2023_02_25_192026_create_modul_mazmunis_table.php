<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulMazmunisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul_mazmunis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('img');
            $table->string('category');
            $table->boolean('is_active');
            $table->boolean('is_moderate');
            $table->text('content');
            $table->boolean('is_private');
            $table->string('file');
            $table->string('url_content');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modul_mazmunis');
    }
}
