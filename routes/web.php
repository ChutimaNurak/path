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

Route::get('/home', function () {
    return view('home');
});

//up route
 Route::resource('/test','ExcelController');


//Customer
Route::resource('/customer','CustomerController');
/*
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/create', 'CustomerController@create');
Route::post('/customer', 'CustomerController@store');
Route::get('/customer/{id}', 'CustomerController@show');
Route::get('/customer/{id}/edit', 'CustomerController@edit');
Route::put('/customer/{id}', 'CustomerController@update');
Route::delete('/customer/{id}', 'CustomerController@destroy');
*/


//Postion
Route::resource('/position','PositionController');


//Job
Route::resource('/job','JobController');


//Route
Route::resource('/route', 'RouteController');
//PDF
Route::get('/job/{ID_Job}/pdf', 'RouteController@downloadpdf');


// Route::resource('/jobA','JobAController');

// //Route
// Route::resource('/routeA', 'RouteAController');
// //PDF
// Route::get('/jobA/{ID_JobA}/pdf', 'RouteAController@downloadpdf');