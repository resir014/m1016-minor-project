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

        $course = new App\Course;

        $course->id = 'ISYS'.'1446';
        $course->name = 'Web Based Programming';
        $course->credits = 2;
        $course->active = false;

        $course->save();

        $course = new App\Course;

        $course->id = 'COMP'.'1342';
        $course->name = 'Networking';
        $course->credits = 2;
        $course->active = false;

        $course->save();

        $course = new App\Course;

        $course->id = 'ENGL'.'1412';
        $course->name = 'English for Business Communications';
        $course->credits = 2;
        $course->active = false;

        $course->save();

        $course = new App\Course;

        $course->id = 'COMP'.'1456';
        $course->name = 'Object Oriented Programming';
        $course->credits = 4;
        $course->active = false;

        $course->save();

        $course = new App\Course;

        $course->id = 'COMP'.'0084';
        $course->name = 'Human and Computer Interaction';
        $course->credits = 4;
        $course->active = false;

        $course->save();
    }
}
