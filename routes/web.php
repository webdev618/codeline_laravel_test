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
    return redirect('films');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/films/create', 'FilmsController@create')->name('film_create');

Route::post('/films/store', 'FilmsController@store')->name('film_store');

Route::get('/films', 'FilmsController@index')->name('films');

Route::get('/films/{slug}', 'FilmsController@view')->name('film');
Route::get('/films/{slug}/comment', 'FilmsController@view')->name('film_view');

Route::post('/films/{slug}/comment', 'FilmsController@comment')->name('film_comment');

