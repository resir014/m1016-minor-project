<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            // Columns in table
            $table->increments('id');
            $table->timestamps();
            $table->integer('fixed_schedule_id')->unsigned();
            $table->string('student_id');
            $table->string('course_id');
            $table->integer('assignment_score')->unsigned();
            $table->integer('midterm_score')->unsigned();
            $table->integer('final_score')->unsigned();
            $table->integer('total_score')->unsigned();

            // Foreign keys
            $table->foreign('fixed_schedule_id')
            ->references('id')->on('fixed_schedules')
            ->onDelete('cascade');
            $table->foreign('student_id')
            ->references('id')->on('students')
            ->onDelete('cascade');
            $table->foreign('course_id')
            ->references('id')->on('courses')
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
        Schema::drop('grades');
    }
}
