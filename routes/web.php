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

Route::get('/', function () { return view('welcome');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('locations', 'LocationController');

Route::get('/ratings/add/{location}', ['uses' => 'RatingController@create'])->name('ratings.create');

Route::post('/ratings', ['uses' => 'RatingController@store'])->name('ratings');

Route::delete('/ratings/destroy_all/{location_id}', ['uses' => 'RatingController@destroy'])->name('ratings.destroy');

Route::delete('/ratings/destroy_id/{rating_id}', ['uses' => 'RatingController@destroy_id'])->name('ratings.destroy_id');

Route::get('/ratings/edit', ['uses' => 'RatingController@edit'])->name('ratings.edit');

Route::put('/ratings/update/{rating_id}', ['uses' => 'RatingController@update'])->name('ratings.update');

Route::get('not-found', function () { return view('not-found');});