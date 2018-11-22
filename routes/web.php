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

Route::get('/test', function () {
    return view('test');
});

Route::get('/test2', function () {
    return view('test2');
});

Route::resource('/customer','CustomerController');
Route::get('/customer/{id}/pdf','CustomerController@downloadPDF');
/*
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/create', 'CustomerController@create');
Route::post('/customer', 'CustomerController@store');
Route::get('/customer/{id}', 'CustomerController@show');
Route::get('/customer/{id}/edit', 'CustomerController@edit');
Route::put('/customer/{id}', 'CustomerController@update');
Route::delete('/customer/{id}', 'CustomerController@destroy');
*/

Route::resource('/position','PositionController');

Route::resource('/job','JobController');
Route::get('/job/{id}/pdf','JobController@downloadPDF');

Route::resource('/route', 'RouteController');
Route::get('/route/dis/{ID_Job}','RouteController@dis');
Route::get('/route/json/{ID_Job}','RouteController@json');