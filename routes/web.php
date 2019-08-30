<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cars', 'CarController@index');
Route::resource('cars', 'CarController');
Route::get('/search', 'CarController@search');

Route::resource('jobs', 'JobController');
Route::get('/cars/{car_id}/jobs', 'JobController@index');

Route::post('cars/{car_id}/jobs', 'JobController@store');