<?php

use Illuminate\Database\Seeder;

class ScheduleDraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        factory(App\ScheduleDraft::class, 'computer', 3)->create();
    }
}
