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
            $table->string('lecturer_id');
            $table->string('days');
            $table->string('shifts');
            $table->boolean('cleared')->default(false);

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
        });
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
