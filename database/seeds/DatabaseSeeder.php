<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(ScheduleDraftTableSeeder::class);
        $this->call(FixedScheduleTableSeeder::class);

        Model::reguard();
    }
}
