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

        factory(App\Course::class, 'computer', 3)->create();
    }
}
