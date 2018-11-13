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

Route::get('/', 'HomeController@getList')->name('home');
# NEW
Route::get('/new', 'HomeController@getNew')->name('new');
Route::post('/f/new', 'HomeController@postNew')->name('post-new');
# EDIT
Route::get('/edit/{username}', 'HomeController@getEdit')->name('edit');
Route::post('/f/edit/{username}', 'HomeController@postEdit')->name('post-edit');
#DELETE
Route::get('/f/delete/{username}', 'HomeController@delete')->name('delete');