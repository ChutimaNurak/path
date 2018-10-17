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
Route::get('/home', function () {
    return view('home');
});

Route::resource('/customer','CustomerController');
Route::resource('/position','PositionController');
Route::resource('/job','JobController');
Route::resource('/route', 'RouteController');
Route::get('/create?ID_Job={{id}}','RouteController@genRoute');
