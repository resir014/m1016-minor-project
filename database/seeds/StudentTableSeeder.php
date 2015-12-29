<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
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

        // Create a sample Student dataset
        for ($i = 1; $i <= 30; $i++) {
            // Student
            $student = new App\Student;

            $student->id = 'S'.sprintf("%04d", $i);
            $student->name = $faker->name;
            $student->admission_year = 2012;
            $student->birth_date = $faker->dateTimeBetween($startDate = '-21 years', $endDate = '-20 years')->format('Y-m-d H:i:s');
            $student->active = true;

            $student->save();
        }
    }
}
