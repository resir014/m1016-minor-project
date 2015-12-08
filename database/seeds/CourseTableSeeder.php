<?php

use Illuminate\Database\Seeder;

/**
 * Creates a sample Course dataset.
 */
class CourseTableSeeder extends Seeder
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
            $course = new App\Course;

            $course->id = 'ENTR'.sprintf("%04d", $i);
            $course->name = 'Entrepreneurship '.$i;
            $course->credits = 2;
            $course->active = false;

            $course->save();
        }

        $course1 = new App\Course;

        $course1->id = 'ISYS'.'1446';
        $course1->name = 'Web Based Programming';
        $course1->credits = 2;
        $course1->active = false;

        $course1->save();

        $course2 = new App\Course;

        $course2->id = 'COMP'.'1342';
        $course2->name = 'Networking';
        $course2->credits = 2;
        $course2->active = false;

        $course2->save();
    }
}
