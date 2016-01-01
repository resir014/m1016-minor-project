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
        // Faker is a library to generate dummy data.
        $faker = Faker\Factory::create();

        // List all ScheduleDraft and Student ids
        $scheduleDrafts = App\ScheduleDraft::all()->lists('id')->toArray();
        $students = App\Student::all()->lists('id')->toArray();

        // Get a random scheduleDraft index
        $selectedDraftIndex = $faker->unique()->randomElement($scheduleDrafts);

        // Load the object of the selected index
        $scheduleDraft = App\scheduleDraft::find($selectedDraftIndex);

        for ($i=1; $i <= 1; $i++) {
            // Create a new FixedSchedule instance
            $fixedSchedule = new App\FixedSchedule;

            // Insert FixedSchedule values
            $fixedSchedule->schedule_draft_id = $selectedDraftIndex;
            $fixedSchedule->lecturer_id = $scheduleDraft->lecturer_id;
            $fixedSchedule->course_id = $scheduleDraft->course_id;
            $fixedSchedule->room_id = $scheduleDraft->room_id;
            $fixedSchedule->day = $scheduleDraft->day;
            $fixedSchedule->shift = $scheduleDraft->shift;

            // Save our changes
            $fixedSchedule->save();

            // Add some sample students
            for ($j=0; $j < 5; $j++) {
                // Get a random scheduleDraft index
                $selectedStudentIndex = $faker->unique()->randomElement($students);

                $fixedSchedule = App\FixedSchedule::find($i);

                // Attaches the selected Student into the pivot table
                $fixedSchedule->students()->attach($selectedStudentIndex);
            }
        }
    }
}
