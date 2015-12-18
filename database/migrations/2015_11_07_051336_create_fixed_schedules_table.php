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
            $table->integer('schedule_draft_id')->unsigned()->unique();
            $table->string('lecturer_id');
            $table->string('course_id');
            $table->string('room_id');
            $table->string('day');
            $table->integer('shift');

            $table->foreign('schedule_draft_id')->references('id')->on('schedule_drafts');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('room_id')->references('id')->on('rooms');
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
