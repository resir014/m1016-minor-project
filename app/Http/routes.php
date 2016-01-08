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

    // Master data
    Route::resource('rooms', 'RoomsController');
    Route::resource('courses', 'CoursesController');
    Route::resource('lecturers', 'LecturersController');
    Route::resource('students', 'StudentsController');

    // Schedule Drafts & Credit Overview
    Route::resource('schedule-drafts', 'ScheduleDraftsController');
    Route::resource('credit-overview', 'CreditOverviewController', [
        'only' => 'index'
    ]);

    // Schedule Request form
    Route::resource('schedule-approvals', 'ScheduleApprovalsController');

    // Fixed Schedules
    Route::resource('fixed-schedules', 'FixedSchedulesController', [
        'except' => ['create']
    ]);
    Route::get('fixed-schedules/create/{id}', 'FixedSchedulesController@create');

    // Attendance forms
    Route::resource('fixed-schedules.attendance', 'AttendanceFormFixedScheduleController');

    // Attendance admin panel
    Route::resource('attendance', 'AttendanceFormsController', [
        'only' => ['index']
    ]);

    // Add Students
    Route::resource('fixed-schedules.add-student', 'AddStudentsController', [
        'only' => ['index']
    ]);
    Route::post('fixed-schedules/{schedule_id}/add-student/store', [
        'as' => 'fixed-schedules.add-student.store',
        'uses' => 'AddStudentsController@store'
    ]);
    Route::post('fixed-schedules/{schedule_id}/add-student/{student_id}/destroy', [
        'as' => 'fixed-schedules.add-student.destroy',
        'uses' => 'AddStudentsController@destroy'
    ]);

    // Update Course status
    Route::resource('course-status', 'CourseStatusController', [
        'only' => ['show', 'edit', 'update']
    ]);

    // Session log
    Route::resource('session-log', 'SessionLogsController');

    // Additional controllers
    Route::controllers([
        'export' => 'ExcelExportController',
    ]);

    // API controllers for Typeahead search
    Route::get('data/lecturers/{query?}', 'SearchController@getLecturers');
    Route::get('data/lecturers-with-approval/{query?}', 'SearchController@getLecturersWithApproval');
    Route::get('data/students/{query?}', 'SearchController@getStudents');
    Route::get('data/new-users/{query?}', 'SearchController@getNewUsers');
    Route::get('data/courses/{query?}', 'SearchController@getCourses');
    Route::get('data/rooms/{query?}', 'SearchController@getRooms');
});

Route::get('mockups/session-log', function() {
    return view('session-log.index');
});
Route::get('mockups/session-log/create', function() {
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

Route::get('mockups/perubahan-nilai', function() {
    return view('mockups.perubahan-nilai');
});
