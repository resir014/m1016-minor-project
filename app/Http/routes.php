<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// All public routes
Route::get('/', 'WelcomeController@index');
Route::get('about', 'PagesController@about');

// We lock these routes only for authenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function() {
        return view('home');
    });

    Route::resource('profile', 'ProfilesController', [
        'only' => ['index', 'edit', 'update']
    ]);

    Route::resource('rooms', 'RoomsController');
    Route::resource('courses', 'CoursesController');
    Route::resource('lecturers', 'LecturersController');
    Route::resource('students', 'StudentsController');
    Route::resource('schedule-drafts', 'ScheduleDraftsController');
    Route::resource('schedule-approvals', 'ScheduleApprovalsController');
    Route::resource('attendance-form', 'AttendanceFormsController');
    Route::resource('fixed-schedules', 'FixedSchedulesController', [
        'except' => ['create']
    ]);
    Route::get('fixed-schedules/create/{id}', 'FixedSchedulesController@create');
    Route::resource('course-status', 'CourseStatusController', [
        'only' => ['show', 'edit', 'update']
    ]);

    Route::get('data/lecturers/{query?}', 'SearchController@getLecturers');
    Route::get('data/lecturers-with-approval/{query?}', 'SearchController@getLecturersWithApproval');
    Route::get('data/new-users/{query?}', 'SearchController@getNewUsers');
    Route::get('data/courses/{query?}', 'SearchController@getCourses');
    Route::get('data/rooms/{query?}', 'SearchController@getRooms');
});

Route::get('session-log', function() {
    return view('session-log.index');
});
Route::get('session-log/create', function() {
    return view('session-log.create');
});

// Controller groups
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Mockups (public)
Route::get('mockups/input-nilai', function() {
    return view('mockups.input-nilai');
});

Route::get('mockups/kesediaan-mengajar', function() {
    return view('mockups.kesedian-mengajar');
});

Route::get('mockups/perubahan-nilai', function() {
    return view('mockups.perubahan-nilai');
});
Route::get('mockups/pembahasan', function() {
    return view('mockups.pembahasan');
});
Route::get('mockups/update-jadwal-kuliah', function() {
    return view('mockups.update-jadwal-kuliah');
});

Route::get('mockups/update-final-jadwal-kuliah', function() {
    return view('mockups.update-final-jadwal-kuliah');
});
