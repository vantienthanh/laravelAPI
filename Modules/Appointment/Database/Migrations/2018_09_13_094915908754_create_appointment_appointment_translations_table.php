<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentAppointmentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment__appointment_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('appointment_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['appointment_id', 'locale']);
            $table->foreign('appointment_id')->references('id')->on('appointment__appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment__appointment_translations', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
        });
        Schema::dropIfExists('appointment__appointment_translations');
    }
}
