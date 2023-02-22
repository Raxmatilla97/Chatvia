<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIshjoyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('yashash_hududi')->nullable();
            $table->string('ish_joyi_yok_oqishi')->nullable();
            $table->string('ticher_or_student')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('yashash_hududi');
            $table->dropColumn('ish_joyi_yok_oqishi');
            $table->dropColumn('ticher_or_student');
        });
    }
}
