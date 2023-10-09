<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get(
    '/login',
    'LoginController@formLogin'
)->name('login')->middleware('guest');

Route::post(
    '/login',
    'LoginController@actionLogin'
)->name('action.login');

Route::get('/','DashboardController@index')->name('dashboard.index');

Route::get('/logout','DashboardController@logout')->name('logout');

Route::get('/users','UserController@index')->name('dashboard.users.index');

Route::post('/users/create', 'UserController@store')->name('dashboard.users.create');
