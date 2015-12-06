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

        for ($i = 1; $i <= 3; $i++) {
            $room = new App\Room;

            $room->id = 'CC10'.$i;
            $room->name = 'Classroom 10'.$i;
            $room->type = 'Classroom';
            $room->location = 'Gedung A';

            $room->save();
        }
    }
}
