<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_drafts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('course_id')->unsigned();
            $table->integer('lecturer_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->string('day');
            $table->integer('shift');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('room_id')->references('id')->on('users');
        });

        // Create the dummy data.
        DB::table('schedule_drafts')->insert([
            'course_id' => 1,
            'lecturer_id' => 1,
            'room_id' => 1,
            'day' => 'Monday',
            'shift' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedule_drafts');
    }
}
