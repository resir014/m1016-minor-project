<?php

use Illuminate\Database\Seeder;

class FixedScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 1; $i++) {
            $fixedSchedule = new App\FixedSchedule;

            $fixedSchedule->schedule_draft_id = 1;
            $fixedSchedule->room_id = 'CC101';
            $fixedSchedule->day = 'Monday';
            $fixedSchedule->shift = 1;

            $fixedSchedule->save();
        }
    }
}
