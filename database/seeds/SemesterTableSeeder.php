<?php

use Illuminate\Database\Seeder;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2014; $i <= 2016; $i++) {
            $year = $i;

            for ($j=1; $j <= 2; $j++) {
                $term = ($j == 1) ? 'Odd' : 'Even';

                $semester = new App\Semester;
                $semester->name = $year . ' - ' . $term;

                $semester->save();
            }
        }
    }
}
