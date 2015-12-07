<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->timestamps();
            $table->integer('admission_year');
            $table->date('birth_date');
            $table->boolean('active')->default(false);
            $table->integer('nilai_tugas')->unsigned();
            $table->integer('nilai_uts')->unsigned();
            $table->integer('nilai_uas')->unsigned();
            $table->integer('nilai_sumatif')->unsigned();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
