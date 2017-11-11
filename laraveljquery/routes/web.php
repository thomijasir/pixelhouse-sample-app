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
Route::post('/home', 'HomeController@add')->name('addtwit');
Route::get('/home/ajaxstore', 'HomeController@ajaxStore')->name('ajaxs');
Route::get('/home/del/{id}', 'HomeController@delete')->name('twitdel');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/profile', 'ProfileController@update')->name('profile_update');

Route::get('/resultview', 'HomeController@resultView')->name('resultApis');

