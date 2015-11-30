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

// parameter pertama itu base urlnya
// jadi misal kalo kita buka ke http://domain/ nanti dia
// bakal load parameter kedua (display kata "hello world"
// di halamannya)
//Route::get('/', function () {
  //  return "welcome";
//});

// yang ini berarti dia ngeload parameter kedua di url http://domain/welcome
//
// bedanya yang ini dia bukan load function lagi, tapi dia ngeload controller
// jadi dia bakal nyari file di app/http/controller dengan class 'WelcomeController'
// terus dia nge-load method 'index'
Route::get('/', 'WelcomeController@index');
Route::get('home', function() {
    return view('home');
});

Route::resource('users', 'UsersController');
Route::resource('rooms', 'RoomsController');
Route::resource('courses', 'CoursesController');
Route::resource('lecturers', 'LecturersController');
Route::resource('students', 'StudentsController');
Route::resource('schedule-drafts', 'ScheduleDraftsController');
Route::resource('profile', 'ProfilesController', [
    'only' => ['show', 'edit', 'update']
]);

// berarti disini dia ngeload PagesController di method 'about' untuk link /about
Route::get('about', 'PagesController@about');

// mockups
Route::get('mockups', function() {
    return "test";
});
Route::get('mockups/input-nilai', function() {
    return view('mockups.input-nilai');
});
Route::get('mockups/draft-jadwal', function() {
    return view('mockups.draft-jadwal');
});

Route::get('mockups/kesediaan-mengajar', function() {
    return view('mockups.kesedian-mengajar');
});

Route::get('mockups/input-mata-kuliah-aktif', function() {
    return view('mockups.input-mata-kuliah-aktif');
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


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
