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

Route::resource('/movie','MovieController');

Route::get('login/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'FacebookController@handleProviderCallback');
