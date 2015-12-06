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

            $course->code = 'ENTR'.sprintf("%04d", $i);
            $course->name = 'Entrepreneurship '.$i;
            $course->credits = 2;
            $course->active = false;

            $course->save();
        }
    }
}
