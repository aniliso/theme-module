<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatethemeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('theme__sliders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields
            $table->integer('page_id')->unsigned()->nullable();
            $table->string('link_type');
            $table->integer('ordering')->unsigned();
            $table->boolean('status')->default(0);

            $table->integer('slide_id')->unsigned()->index()->nullable();
            $table->foreign('slide_id')->references('id')->on('theme__slides')->onDelete('SET NULL');

            $table->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::table('store__products', function (Blueprint $table) {
            $table->dropForeign(['slide_id']);
        });
        Schema::dropIfExists('theme__sliders');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
