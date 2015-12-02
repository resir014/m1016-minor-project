<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nomor_induk')->unique();
            $table->integer('beban_jabatan');
            $table->string('jabatan');
            $table->string('spesialisasi');
        });

        // Create the dummy data.
        DB::table('lecturers')->insert([
            'nomor_induk' => 'D0001',
            'beban_jabatan' => 6,
            'jabatan' => 'Dosen',
            'spesialisasi' => 'Teknik'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lecturers');
    }
}
