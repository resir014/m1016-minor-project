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
        factory(App\Course::class, 'english', 3)->create();

        for ($i=1; $i <= 3; $i++) {
            factory(App\Course::class, 'entrepreneurship')->create([
                'id' => 'ENTR' . sprintf('%04d', $i),
                'name' => 'Entrepreneurship ' . $i,
            ]);
        }
    }
}
