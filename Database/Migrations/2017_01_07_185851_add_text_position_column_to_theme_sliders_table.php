<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTextPositionColumnToThemeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme__sliders', function (Blueprint $table) {
            $table->integer('position_x')->default(30)->nullable();
            $table->integer('position_y')->default(30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theme__sliders', function (Blueprint $table) {
            $table->dropColumn(['position_x', 'position_y']);
        });
    }
}
