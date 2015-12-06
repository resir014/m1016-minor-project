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
        $faker = Faker\Factory::create();

        // $this->call(UserTableSeeder::class);

        // Create a sample Admin userset
        for ($i = 1; $i <= 2; $i++) {
            // User
            $user = new App\User;

            $user->name = $faker->name;
            $user->email = 'test.admin'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->userable_id = $i;
            $user->userable_type = 'Admin';
            $user->save();

            // Admin
            $admin = new App\Admin;

            $admin->nomor_induk = 'A'.sprintf("%04d", $i);
            $admin->jabatan = 'Admin';
            $admin->save();
        }

        // Create a sample Lecturer userset
        for ($i = 1; $i <= 5; $i++) {
            // User
            $user = new App\User;

            $user->name = $faker->name;
            $user->email = 'test.lecturer'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->userable_id = $i;
            $user->userable_type = 'Lecturer';
            $user->save();

            // Admin
            $lecturer = new App\Lecturer;

            $lecturer->nomor_induk = 'D'.sprintf("%04d", $i);
            $lecturer->beban_jabatan = 6;
            $lecturer->jabatan = 'Dosen';
            $lecturer->spesialisasi = 'Teknik';
            $lecturer->save();
        }

        // Create a sample Student userset
        for ($i = 1; $i <= 15; $i++) {
            // User
            $user = new App\User;

            $user->name = $faker->name;
            $user->email = 'test.student'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->userable_id = $i;
            $user->userable_type = 'Student';
            $user->save();

            // Student
            $lecturer = new App\Student;

            $lecturer->nomor_induk = 'S'.sprintf("%04d", $i);
            $lecturer->tahun_masuk = 2012;
            $lecturer->tanggal_lahir= $faker->dateTimeBetween($startDate = '-21 years', $endDate = '-20 years');
            $lecturer->active = true;
            $lecturer->save();
        }

        Model::reguard();

        /*
        DB::table('users')->insert([
            'name' => 'Test Lecturer',
            'email' => 'test.lecturer@example.com',
            'password' => bcrypt('password'),
            'userable_id' => 1,
            'userable_type' => 'App\Lecturer'
        ]);

        DB::table('users')->insert([
            'name' => 'Test Student',
            'email' => 'test.student@example.com',
            'password' => bcrypt('password'),
            'userable_id' => 1,
            'userable_type' => 'App\Student'
        ]);

        DB::table('students')->insert([
            'nomor_induk' => 'S0001',
            'tahun_masuk' => 2012,
            'tanggal_lahir' => '1995-01-12',
            'status' => 'Available'
        ]);

        DB::table('lecturers')->insert([
            'nomor_induk' => 'D0001',
            'beban_jabatan' => 6,
            'jabatan' => 'Dosen',
            'spesialisasi' => 'Teknik'
        ]);

        DB::table('admins')->insert([
            'nomor_induk' => 'A0001',
            'jabatan' => 'Admin'
        ]);

        DB::table('courses')->insert([
            'code' => 'ENTR0002',
            'name' => 'Entrepreneurship 2',
            'credits' => 2
        ]);

        DB::table('rooms')->insert([
            'number' => 'CC101',
            'name' => 'Classroom 101',
            'type' => 'Classroom',
            'location' => 'Gedung A'
        ]);

        DB::table('schedule_drafts')->insert([
            'course_id' => 1,
            'lecturer_id' => 1,
            'room_id' => 1,
            'day' => 'Monday',
            'shift' => 1
        ]);

        DB::table('fixed_schedules')->insert([
            'schedule_draft_id' => 1,
            'day' => 'Monday',
            'shift' => 1,
            'student_id' => 1
        ]);

        DB::table('schedule_approvals')->insert([
            'lecturer_id' => 1,
            'day' => 'Monday',
            'shift' => 1,
            'cleared' => true
        ]);
        */
    }
}
