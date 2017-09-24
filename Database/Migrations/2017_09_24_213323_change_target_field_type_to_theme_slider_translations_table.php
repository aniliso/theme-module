<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTargetFieldTypeToThemeSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme__sliders', function (Blueprint $table) {
            $table->string('target')->nullable();
        });
        Schema::table('theme__slider_translations', function (Blueprint $table) {
            $table->dropColumn('target');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theme__slider_translations', function (Blueprint $table) {
            $table->string('target')->nullable();
        });
        Schema::table('theme__sliders', function (Blueprint $table) {
            $table->dropColumn('target');
        });
    }
}
