<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('dashboard');
Route::get('/search', 'PageController@search')->name('search');
Route::post('/edit', 'PageController@edit')->name('edit');
Route::post('/delete', 'PageController@delete')->name('delete');
Route::post('/insert', 'PageController@insert')->name('insert');
Route::get('/getrow', 'PageController@getrow');