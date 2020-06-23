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


Route::get('/mapSpotsList','MapSpotsListController@index');

//topページ
Route::get('/top', 'AnimeController@index');

// 初めての方向けページ
Route::get('/guide', 'GuideAction');


// スポット追加フォーム
Route::post('/mapSpotsList/create', 'AddSpotController@create');
Route::get('/mapSpotsList/create', 'AddSpotController@create');
// スポット追加
Route::post('/add_spot', 'AddSpotController@store');


//アニメ検索後
Route::get('/maps/anime', 'AnimeController@animeIndex');

