<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatethemeSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme__slider_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('title');
            $table->string('sub_title');
            $table->text('content');

            $table->string('link_title')->nullable();
            $table->string('url')->nullable();
            $table->string('uri')->nullable();
            $table->string('target', 10)->nullable();

            $table->integer('slider_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')->references('id')->on('theme__sliders')->onDelete('cascade');
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
            $table->dropForeign(['slider_id']);
        });
        Schema::dropIfExists('theme__slider_translations');
    }
}
