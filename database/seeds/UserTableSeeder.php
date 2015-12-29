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

        factory(App\User::class, 'master-admin')->create([
            'userable_id' => 'A0001',
        ]);

        factory(App\Admin::class, 'master-admin')->create([
            'id' => 'A0001',
        ]);

        for ($i = 0; $i < 3; $i++) {
            $randomNumberTemp = $faker->unique()->numberBetween(1,9999);

            factory(App\User::class, 'admin')->create([
                'userable_id' => 'A' . sprintf('%04d', $randomNumberTemp),
            ]);

            factory(App\Admin::class, 'admin')->create([
                'id' => 'A0001' . sprintf('%04d', $randomNumberTemp),
            ]);
        }

        factory(App\User::class, 'test-lecturer')->create([
            'userable_id' => 'D0001',
        ]);

        factory(App\Lecturer::class, 'test-lecturer')->create([
            'id' => 'D0001',
        ]);

        for ($i = 0; $i < 10; $i++) {
            $randomNumberTemp = $faker->unique()->numberBetween(1,9999);

            factory(App\User::class, 'lecturer')->create([
                'userable_id' => 'D' . sprintf('%04d', $randomNumberTemp),
            ]);

            factory(App\Lecturer::class, 'lecturer')->create([
                'id' => 'D' . sprintf('%04d', $randomNumberTemp),
            ]);
        }
    }
}
