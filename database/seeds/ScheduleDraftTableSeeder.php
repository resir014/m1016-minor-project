<?php

use Illuminate\Database\Seeder;

class ScheduleDraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 1; $i++) {
            $scheduleDraft = new App\ScheduleDraft;

            $scheduleDraft->course_id = 'ENTR0002';
            $scheduleDraft->lecturer_id = 'D0004';
            $scheduleDraft->room_id = 'CC101';
            $scheduleDraft->day = 'Monday';
            $scheduleDraft->shift = 1;

            $scheduleDraft->save();
        }

        for ($i = 1; $i <= 1; $i++) {
            $scheduleDraft = new App\ScheduleDraft;

            $scheduleDraft->course_id = 'ENTR0001';
            $scheduleDraft->lecturer_id = 'D0004';
            $scheduleDraft->room_id = 'CC102';
            $scheduleDraft->day = 'Monday';
            $scheduleDraft->shift = 2;

            $scheduleDraft->save();
        }

        for ($i = 1; $i <= 3; $i++) {
            $scheduleDraft = new App\ScheduleDraft;

            $scheduleDraft->course_id = 'ENTR0001';
            $scheduleDraft->lecturer_id = 'D0001';
            $scheduleDraft->room_id = 'CC101';
            $scheduleDraft->day = 'Tuesday';
            $scheduleDraft->shift = $i;

            $scheduleDraft->save();
        }
    }
}
