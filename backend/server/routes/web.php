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

Route::post('/home', 'HomeController@postEvent')->name('home.event');

Route::get('/volunteer', 'HomeController@getVolunteer')->name('vol.add');
Route::post('/volunteer', 'HomeController@postVolunteer');

Route::get('/show', 'HomeController@showEvent')->name('vol.show');
