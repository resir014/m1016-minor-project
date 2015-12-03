<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('lecturer_id')->unsigned();
            $table->string('day');
            $table->integer('shift');
            $table->boolean('cleared')->default(false);

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
        });

        // Create the dummy data.
        DB::table('schedule_approvals')->insert([
            'lecturer_id' => 1,
            'day' => 'Monday',
            'shift' => 1,
            'cleared' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedule_approvals');
    }
}
