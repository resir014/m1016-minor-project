<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('credits');
            $table->boolean('active')->default(false);
        });

        // Create the dummy data.
        DB::table('courses')->insert([
            'code' => 'ENTR0002',
            'name' => 'Entrepreneurship 2',
            'credits' => 2
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
