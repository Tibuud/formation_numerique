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

Route::get('/', 'FrontController@index');

Route::get('post/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('showType/{type}', 'FrontController@showType');

Route::post('search', 'FrontController@search');
