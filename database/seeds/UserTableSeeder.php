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
        $faker = Faker\Factory::create();

        // Creates a sample Admin userset
        for ($i = 1; $i <= 2; $i++) {
            // User
            $user = new App\User;

            $user->name = $faker->name;
            $user->email = 'test.admin'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->userable_id = 'A'.sprintf("%04d", $i);
            $user->userable_type = 'Admin';

            $user->save();

            // Admin
            $admin = new App\Admin;

            $admin->id = 'A'.sprintf("%04d", $i);
            $admin->role = 'Admin';

            $admin->save();
        }

        // Create a sample Lecturer userset
        for ($i = 1; $i <= 5; $i++) {
            // User
            $user = new App\User;

            $user->name = $faker->name;
            $user->email = 'test.lecturer'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->userable_id = 'D'.sprintf("%04d", $i);
            $user->userable_type = 'Lecturer';

            $user->save();

            // Admin
            $lecturer = new App\Lecturer;

            $lecturer->id = 'D'.sprintf("%04d", $i);
            $lecturer->self_credit = 6;
            $lecturer->role = 'Dosen';
            $lecturer->field = 'Teknik';

            $lecturer->save();
        }

        // Create a sample Student userset
        for ($i = 1; $i <= 15; $i++) {
            // User
            $user = new App\User;

            $user->name = $faker->name;
            $user->email = 'test.student'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->userable_id = 'S'.sprintf("%04d", $i);
            $user->userable_type = 'Student';

            $user->save();

            // Student
            $student = new App\Student;

            $student->id = 'S'.sprintf("%04d", $i);
            $student->admission_year = 2012;
            $student->birth_date = $faker->dateTimeBetween($startDate = '-21 years', $endDate = '-20 years')->format('Y-m-d H:i:s');
            $student->active = true;

            $student->save();
        }
    }
}
