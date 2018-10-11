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


Route::get('/', 'LoginController@showLogin') ->name('show.login');

Route::post('/login', 'LoginController@login')->name('user.login');

Route::get('/login', 'LoginController@loginform') ->name('show.login');

Route::get('/logout', 'LoginController@logout')->name('user.logout');

Route::get('/blog', 'LoginController@showBlog')->name('show.blog');