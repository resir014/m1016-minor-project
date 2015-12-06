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
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 2; $i++) {
            $room = new App\Room;

            $room->number = 'CC101';
            $room->name = 'Classroom 101';
            $room->type = 'Classroom';
            $room->location = 'Gedung A';

            $room->save();
        ]);
    }
}
