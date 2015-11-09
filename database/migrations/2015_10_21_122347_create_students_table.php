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
            $table->increments('id');
            $table->timestamps();
            $table->string('nomor_induk')->unique();
            $table->integer('tahun_masuk');
            $table->date('tanggal_lahir');
            $table->string('status');
            $table->integer('nilai_tugas')->unsigned();
            $table->integer('nilai_uts')->unsigned();
            $table->integer('nilai_uas')->unsigned();
            $table->integer('nilai_sumatif')->unsigned();
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
