<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedScheduleStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_schedule_student', function (Blueprint $table) {
            $table->integer('fixed_schedule_id')->unsigned();
            $table->string('student_id');

            $table->foreign('fixed_schedule_id')
                ->references('id')->on('fixed_schedules')
                ->onDelete('cascade');

            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fixed_schedule_student');
    }
}
