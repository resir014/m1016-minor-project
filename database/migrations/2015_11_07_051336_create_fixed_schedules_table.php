<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('schedule_draft_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('lecturer_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->date('date');
            $table->integer('shift');
            $table->integer('student_id')->unsigned();

            $table->foreign('schedule_draft_id')->references('id')->on('schedule_drafts');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('room_id')->references('id')->on('users');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fixed_schedules');
    }
}
