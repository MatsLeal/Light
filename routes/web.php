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

Route::resource('/expenses','ExpenseController');

Route::resource('/types','TypeController');

Route::resource('/incomings','IncomingController');

Route::get('/dashboard', 'DashBoardController@index');

Route::get('/monthexpenses/{monthnumber}','ExpenseController@monthexpenses');