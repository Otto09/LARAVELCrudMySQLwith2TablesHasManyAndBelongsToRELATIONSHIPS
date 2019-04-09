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

Route::resource('owners', 'OwnersController');

Route::post('/owners/{owner}/specifics', 'OwnerSpecificsController@store');

Route::patch('/specifics/{specific}', 'OwnerSpecificsController@update');

/*Route::get('/owners', 'OwnersController@index');
Route::get('/owners/create', 'OwnersController@create');
Route::get('/owners/{owner}', 'OwnersController@show');
Route::post('/owners', 'OwnersController@store');
Route::get('/owners/{owner}/edit', 'OwnersController@edit');
Route::patch('/owners/{owner}', 'OwnersController@update');
Route::delete('/owners/{owner}', 'OwnersController@destroy');*/
