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
//login,user,regist ために
Auth::routes();

Route::get('/mapSpotsList','MapSpotsListController@index');
Route::resource('like','LikeController')->only(['index','destroy']);