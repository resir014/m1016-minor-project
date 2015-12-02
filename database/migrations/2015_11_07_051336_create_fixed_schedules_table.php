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
            $table->integer('schedule_draft_id')->unsigned();
            $table->string('day');
            $table->integer('shift');
            $table->integer('student_id')->unsigned();

            $table->foreign('schedule_draft_id')->references('id')->on('schedule_drafts');
            $table->foreign('student_id')->references('id')->on('students');
        });

        // Create the dummy data.
        DB::table('fixed_schedules')->insert([
            'schedule_draft_id' => 1,
            'day' => 'Monday',
            'shift' => 1,
            'student_id' => 1
        ]);
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
