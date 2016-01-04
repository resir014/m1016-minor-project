<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleDraftSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_draft_semester', function (Blueprint $table) {
            $table->integer('schedule_draft_id')->unsigned();
            $table->integer('semester_id')->unsigned();

            $table->foreign('schedule_draft_id')
                ->references('id')->on('schedule_drafts')
                ->onDelete('cascade');

            $table->foreign('semester_id')
                ->references('id')->on('semesters')
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
        Schema::drop('schedule_draft_semester');
    }
}
