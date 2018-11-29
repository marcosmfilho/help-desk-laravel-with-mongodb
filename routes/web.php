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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('occurrences/me', 'OccurrenceController@myOccurrences')->name('myOccurrences')->middleware('auth');
Route::resource('occurrences','OccurrenceController')->middleware('auth');

Route::get('users/promoteToAdmin', 'UserController@promoteToAdmin')->name('promoteToAdmin')->middleware('auth');
Route::get('users/promoteToAgent', 'UserController@promoteToAgent')->name('promoteToAgent')->middleware('auth');
Route::get('users/promoteToClient', 'UserController@promoteToClient')->name('promoteToClient')->middleware('auth');
Route::resource('users','UserController')->middleware('auth');