<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CourseTableSeeder::class);

        Model::reguard();

        /*
        DB::table('rooms')->insert([
            'number' => 'CC101',
            'name' => 'Classroom 101',
            'type' => 'Classroom',
            'location' => 'Gedung A'
        ]);

        DB::table('schedule_drafts')->insert([
            'course_id' => 1,
            'lecturer_id' => 1,
            'room_id' => 1,
            'day' => 'Monday',
            'shift' => 1
        ]);

        DB::table('fixed_schedules')->insert([
            'schedule_draft_id' => 1,
            'day' => 'Monday',
            'shift' => 1,
            'student_id' => 1
        ]);

        DB::table('schedule_approvals')->insert([
            'lecturer_id' => 1,
            'day' => 'Monday',
            'shift' => 1,
            'cleared' => true
        ]);
        */
    }
}
