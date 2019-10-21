<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMusicAddExtra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('musics', function (Blueprint $table) {
            //
            $table->index('id');
            $table->string('slug');
            $table->integer('views')->default(0);
            $table->integer('streams')->default(0);
            $table->integer('featured')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('music', function (Blueprint $table) {
            //
            $table->dropColumn('slug');
            $table->dropColumn('views');
            $table->dropColumn('streams');
            $table->dropColumn('featured');
        });
    }
}
