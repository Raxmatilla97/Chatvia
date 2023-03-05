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
            $table->string('slug')->nullable();
            $table->string('img')->nullable();
            $table->string('category')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('is_moderate')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_private')->nullable();
            $table->string('file')->nullable();
            $table->string('url_content')->nullable();
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
