<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('number')->unique();
            $table->string('name');
            $table->string('type');
            $table->string('location');
            $table->boolean('available')->default(true);
        });

        // Create the dummy data.
        DB::table('rooms')->insert([
            'number' => 'CC101',
            'name' => 'Classroom 101',
            'type' => 'Classroom',
            'location' => 'Gedung A'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms');
    }
}
