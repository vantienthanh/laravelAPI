<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post__post_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('post_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('post__posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post__post_translations', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
        });
        Schema::dropIfExists('post__post_translations');
    }
}
