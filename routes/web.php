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

Route::get('post/{id}', 'FrontController@show')->where(['id' => '[0-9]+'])->name('post');

Route::get('showType/{type}', 'FrontController@showType');

Route::any('search', 'FrontController@search')->name('search');

Route::get('contact', 'FrontController@contact');

Route::post('sendEmail', 'FrontController@sendEmail');

Route::resource('admin/post', 'PostController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
