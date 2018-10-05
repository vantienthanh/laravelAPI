<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorynewEntityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category__newentity_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('newentity_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['newentity_id', 'locale']);
            $table->foreign('newentity_id')->references('id')->on('category__newentities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category__newentity_translations', function (Blueprint $table) {
            $table->dropForeign(['newentity_id']);
        });
        Schema::dropIfExists('category__newentity_translations');
    }
}
