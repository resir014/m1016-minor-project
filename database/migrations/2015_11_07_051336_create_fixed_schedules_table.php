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

            $table->foreign('schedule_draft_id')->references('id')->on('schedule_drafts');
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
