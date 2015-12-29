<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creates a sample Student userset
        factory(App\Room::class, 'classrooms', 10)->create();
    }
}
