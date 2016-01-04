<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleApprovalSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_approval_semester', function (Blueprint $table) {
            $table->integer('schedule_approval_id')->unsigned();
            $table->integer('semester_id')->unsigned();

            $table->foreign('schedule_approval_id')
                ->references('id')->on('schedule_approvals')
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
        Schema::drop('schedule_approval_semester');
    }
}
