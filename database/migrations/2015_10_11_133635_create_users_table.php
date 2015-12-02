<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->rememberToken();
            $table->timestamps();
            $table->morphs('userable');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
        });

        // Create the dummy data.

        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'userable_id' => 1,
            'userable_type' => 'App\Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Test Lecturer',
            'email' => 'test.lecturer@example.com',
            'password' => bcrypt('password'),
            'userable_id' => 1,
            'userable_type' => 'App\Lecturer'
        ]);

        DB::table('users')->insert([
            'name' => 'Test Student',
            'email' => 'test.student@example.com',
            'password' => bcrypt('password'),
            'userable_id' => 1,
            'userable_type' => 'App\Student'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
