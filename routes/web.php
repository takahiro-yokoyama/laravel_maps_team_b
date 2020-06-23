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

//topページ
Route::get('/top', 'AnimeController@index');

// 初めての方向けページ
Route::get('/guide', 'GuideAction');

//スポット詳細画面ページ
Route::get('/detail/{id}', 'DetailController@detail');
Route::post('/detail', 'DetailController@store');