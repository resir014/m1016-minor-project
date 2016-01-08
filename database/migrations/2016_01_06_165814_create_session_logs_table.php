<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('fixed_schedule_id')->unsigned();
            $table->integer('attendance_form_id')->unsigned();
            $table->integer('score_form_id')->unsigned();
            $table->integer('number_of_students_present');
            $table->text('remarks');

            $table->foreign('fixed_schedule_id')->references('id')->on('fixed_schedules')->onDelete('cascade');
            $table->foreign('attendance_form_id')->references('id')->on('attendance_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('session_logs');
    }
}
