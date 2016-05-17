<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(App\User::class, 'master-admin', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => 'test.admin.0001@example.com',
        'userable_id' => 'A' . '0001',
        'userable_type' => 'Admin',
        'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\Admin::class, 'master-admin', function (Faker\Generator $faker) {
    return [
        'id' => 'A' . '0001',
        'role' => 'Admin',
    ];
});

$factory->defineAs(App\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->email,
        'userable_id' => 'A' . sprintf('%04d', $faker->numberBetween(0,9999)),
        'userable_type' => 'Admin',
        'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\Admin::class, 'admin', function (Faker\Generator $faker) {
    return [
        'id' => 'A' . sprintf("%04d", $faker->numberBetween(0,9999)),
        'role' => 'Admin',
    ];
});

$factory->defineAs(App\User::class, 'test-lecturer', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => 'test.lecturer.0001@example.com',
        'userable_id' => 'D' . '0001',
        'userable_type' => 'Lecturer',
        'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\Lecturer::class, 'test-lecturer', function (Faker\Generator $faker) {
    return [
        'id' => 'D' . '0001',
        'self_credit' => 6,
        'role' => 'Lecturer',
        'field' => 'COMP',
    ];
});

$factory->defineAs(App\User::class, 'lecturer', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->email,
        'userable_id' => 'D' . '0001',
        'userable_type' => 'Lecturer',
        'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\Lecturer::class, 'lecturer', function (Faker\Generator $faker) {
    return [
        'id' => 'D' . '0001',
        'self_credit' => 6,
        'role' => 'Lecturer',
        'field' => $faker->randomElement(['COMP', 'ENTR', 'MGMT', 'ENGL']),
    ];
});

$factory->defineAs(App\User::class, 'test-student', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->email,
        'userable_id' => 'S' . '0001',
        'userable_type' => 'Student',
        'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\Student::class, 'test-student', function (Faker\Generator $faker) {
    return [
        'id' => 'S' . '0001',
        'admission_year' => 2012,
        'birth_date' => $faker->dateTimeBetween($startDate = '-21 years', $endDate = '-20 years')->format('Y-m-d H:i:s'),
        'active' => true,
    ];
});

$factory->defineAs(App\User::class, 'student', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->email,
        'userable_id' => 'S' . '0001',
        'userable_type' => 'Student',
        'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\Student::class, 'student', function (Faker\Generator $faker) {
    return [
        'id' => 'S' . '0001',
        'admission_year' => 2012,
        'birth_date' => $faker->dateTimeBetween($startDate = '-21 years', $endDate = '-20 years')->format('Y-m-d H:i:s'),
        'active' => true,
    ];
});

$factory->defineAs(App\Room::class, 'classrooms', function (Faker\Generator $faker) {
    $uniqueTemp = $faker->unique()->numberBetween(1,9999);

    return [
        'id' => 'CC' . sprintf('%04d', $uniqueTemp),
        'name' => 'Classroom ' . sprintf('%04d', $uniqueTemp),
        'type' => 'Classroom',
        'location' => 'Gedung A',
    ];
});

$factory->defineAs(App\Course::class, 'computer', function (Faker\Generator $faker) {
    return [
        'id' => 'COMP' . sprintf('%04d', $faker->unique()->numberBetween(1,9999)),
        'name' => $faker->sentence(6),
        'credits' => $faker->numberBetween(2,4),
        'active' => false,
    ];
});

$factory->defineAs(App\Course::class, 'entrepreneurship', function (Faker\Generator $faker) {
    return [
        'id' => 'ENTR' . sprintf('%04d', $faker->unique()->numberBetween(1,9999)),
        'name' => $faker->sentence(6),
        'credits' => $faker->numberBetween(2,4),
        'active' => false,
    ];
});

$factory->defineAs(App\Course::class, 'english', function (Faker\Generator $faker) {
    return [
        'id' => 'ENGL' . sprintf('%04d', $faker->unique()->numberBetween(1,9999)),
        'name' => $faker->sentence(6),
        'credits' => 2,
        'active' => false,
    ];
});

$factory->defineAs(App\ScheduleDraft::class, 'computer', function (Faker\Generator $faker) {
    $courses = App\Course::all()->lists('id')->toArray();
    $lecturers = App\Lecturer::all()->lists('id')->toArray();
    $rooms = App\Room::all()->lists('id')->toArray();

    return [
        'course_id' => $faker->randomElement($courses),
        'lecturer_id' => $faker->randomElement($lecturers),
        'room_id' => $faker->randomElement($rooms),
        'class_id' => 'CA' . sprintf('%02d', $faker->unique()->numberBetween(1,99)),
        'day' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
        'shift' => $faker->numberBetween(1,4),
    ];
});

$factory->define(App\FixedSchedule::class, function (Faker\Generator $faker) {
    $scheduleDrafts = App\ScheduleDraft::all()->lists('id')->toArray();

    $selectedIndex = $faker->unique()->randomElement($scheduleDrafts);
    $scheduleDraft = App\scheduleDraft::find($selectedIndex);

    return [
        'schedule_draft_id' => $selectedIndex,
        'lecturer_id' => $scheduleDraft->lecturer_id,
        'course_id' => $scheduleDraft->course_id,
        'rooom_id' => $scheduleDraft->room_id,
        'day' => $scheduleDraft->day,
        'shift' => $scheduleDraft->shift,
    ];
});
