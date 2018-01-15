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


Route::get('person', 'PersonController@index');
Route::get('person/create', 'PersonController@create');
Route::post('person', 'PersonController@store');
Route::get('person/{id}', 'PersonController@show');
Route::get('person/{id}/edit', 'PersonController@edit');
Route::patch('person/{id}', 'PersonController@update');
Route::delete('person/{id}', 'PersonController@destroy');


Route::get('check-in', 'PersonController@check_in');
Route::post('check-in', 'PersonController@storeCheckIn');
