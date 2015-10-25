<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGradesToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('nilai_tugas');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->integer('nilai_sumatif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'nilai_tugas',
                'nilai_uts',
                'nilai_uas',
                'nilai_sumatif'
            ]);
        });
    }
}
