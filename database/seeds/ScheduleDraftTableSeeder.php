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

        factory(App\ScheduleDraft::class, 'computer', 6)->create();

        $scheduleDrafts = App\ScheduleDraft::all()->lists('id')->toArray();
        $semesters = App\Semester::all()->lists('id')->toArray();

        for ($i=1; $i <= 6; $i++) {
            $selectedSemesterIndex = $faker->randomElement($semesters);

            $scheduleDraft = App\ScheduleDraft::findOrFail($i);

            $scheduleDraft->semesters()->attach($selectedSemesterIndex);
        }
    }
}
