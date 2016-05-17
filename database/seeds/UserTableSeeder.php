<?php

use Illuminate\Database\Seeder;

/**
 * Creates a sample Admin, Lecturer and Student userset.
 */
class UserTableSeeder extends Seeder
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

        // Seeds for test admins.
        for ($i = 1; $i <= 3; $i++) {
            factory(App\User::class, 'admin')->create([
                'email' => 'test.admin.' . sprintf('%04d', $i) . '@example.com',
                'userable_id' => 'A' . sprintf('%04d', $i),
            ]);

            factory(App\Admin::class, 'admin')->create([
                'id' => 'A' . sprintf('%04d', $i),
            ]);
        }

        // Seeds for test lecturers.
        for ($i = 1; $i <= 5; $i++) {
            factory(App\User::class, 'test-lecturer')->create([
                'email' => 'test.lecturer.' . sprintf('%04d', $i) . '@example.com',
                'userable_id' => 'D' . sprintf('%04d', $i),
            ]);

            factory(App\Lecturer::class, 'test-lecturer')->create([
                'id' => 'D' . sprintf('%04d', $i),
            ]);
        }

        // Seeds for random lecturers.
        for ($i = 0; $i < 15; $i++) {
            $randomNumberTemp = $faker->unique()->numberBetween(6,9999);

            factory(App\User::class, 'lecturer')->create([
                'email' => 'test.lecturer.' . sprintf('%04d', $randomNumberTemp) . '@example.com',
                'userable_id' => 'D' . sprintf('%04d', $randomNumberTemp),
            ]);

            factory(App\Lecturer::class, 'lecturer')->create([
                'id' => 'D' . sprintf('%04d', $randomNumberTemp),
            ]);
        }

        // Seeds for test students.
        for ($i = 1; $i <= 5; $i++) {
            factory(App\User::class, 'test-student')->create([
                'email' => 'test.student.' . sprintf('%04d', $i) . '@example.com',
                'userable_id' => 'S' . sprintf('%04d', $i),
            ]);

            factory(App\Student::class, 'test-student')->create([
                'id' => 'S' . sprintf('%04d', $i),
            ]);
        }

        // Seeds for random students.
        for ($i = 0; $i < 50; $i++) {
            $randomNumberTemp = $faker->unique()->numberBetween(6,9999);

            factory(App\User::class, 'student')->create([
                'email' => 'test.student.' . sprintf('%04d', $randomNumberTemp) . '@example.com',
                'userable_id' => 'S' . sprintf('%04d', $randomNumberTemp),
            ]);

            factory(App\Student::class, 'student')->create([
                'id' => 'S' . sprintf('%04d', $randomNumberTemp),
            ]);
        }
    }
}
