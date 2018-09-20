<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryUsersTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category__users_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('users_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['users_id', 'locale']);
            $table->foreign('users_id')->references('id')->on('category__users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category__users_translations', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
        });
        Schema::dropIfExists('category__users_translations');
    }
}
