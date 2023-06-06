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

Route::get('/', 'App\Http\Controllers\HomeController@index')->middleware('auth')->name('dashboard');
Route::get('/create', 'App\Http\Controllers\HomeController@create')->middleware('auth')->name('instance.create');
Route::post('/create', 'App\Http\Controllers\HomeController@store')->middleware('auth')->name('instance.store');
Route::get('/edit/{instance}', 'App\Http\Controllers\HomeController@edit')->middleware('auth')->name('instance.edit');
Route::put('{instance}', 'App\Http\Controllers\HomeController@update')->middleware('auth')->name('instance.update');
Route::delete('{instance}', 'App\Http\Controllers\HomeController@delete')->middleware('auth')->name('instance.destroy');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login.authenticate');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
