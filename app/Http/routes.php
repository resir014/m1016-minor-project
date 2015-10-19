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
Route::get('/', function () {
    return "hello world";
});

// yang ini berarti dia ngeload parameter kedua di url http://domain/welcome
//
// bedanya yang ini dia bukan load function lagi, tapi dia ngeload controller
// jadi dia bakal nyari file di app/http/controller dengan class 'WelcomeController'
// terus dia nge-load method 'index'
Route::get('/welcome', 'WelcomeController@index');

// berarti disini dia ngeload PagesController di method 'about' untuk link /about
Route::get('/about', 'PagesController@about');
