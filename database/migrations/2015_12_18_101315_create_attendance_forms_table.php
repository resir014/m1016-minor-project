<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('fixed_schedule_id')->unsigned();
            $table->string('lecturer_id');
            $table->string('course_id');
            $table->string('day');
            $table->string('shift');

            $table->foreign('fixed_schedule_id')->references('id')->on('fixed_schedules');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendance_forms');
    }
}
