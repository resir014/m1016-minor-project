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

        for ($i = 1; $i <= 5; $i++) {
            $room = new App\Room;

            $room->id = 'CC10'.$i;
            $room->name = 'Classroom 10'.$i;
            $room->type = 'Classroom';
            $room->location = 'Gedung A';

            $room->save();
        }

        for ($i = 1; $i <= 4; $i++) {
            $room = new App\Room;

            $room->id = 'CC20'.$i;
            $room->name = 'Classroom 20'.$i;
            $room->type = 'Classroom';
            $room->location = 'Gedung A';

            $room->save();
        }

        for ($i = 1; $i <= 2; $i++) {
            $room = new App\Room;

            $room->id = 'LC20'.$i;
            $room->name = 'Computer Laboratory '.$i;
            $room->type = 'Laboratory';
            $room->location = 'Gedung B';

            $room->save();
        }
    }
}
