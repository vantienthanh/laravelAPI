<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorColorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color__color_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('color_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['color_id', 'locale']);
            $table->foreign('color_id')->references('id')->on('color__colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color__color_translations', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
        });
        Schema::dropIfExists('color__color_translations');
    }
}
