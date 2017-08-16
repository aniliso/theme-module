<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNullSomeColumnsToThemeSliderTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme__slider_translations', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('sub_title')->nullable()->change();
            $table->text('content')->nullable()->change();
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
            $table->string('title')->nullable(false)->change();
            $table->string('sub_title')->nullable(false)->change();
            $table->text('content')->nullable(false)->change();
        });
    }
}
