<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppendTextPositionToThemeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme__sliders', function (Blueprint $table) {
            $table->enum('position_h', ['left', 'center', 'right'])->default('left');
            $table->enum('position_v', ['top', 'center', 'bottom'])->default('center');
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
            $table->dropColumn('position_h');
            $table->dropColumn('position_v');
        });
    }
}
