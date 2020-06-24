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


//topページ
Route::get('/top', 'AnimeController@index');

// 初めての方向けページ
Route::get('/guide', 'GuideAction');


//アニメ検索後
Route::post('/maps/anime_search', 'AnimeController@animeIndex')->name('maps.anime_index');
Route::post('/maps/place_search', 'AnimeController@placeIndex')->name('maps.place_index');
Route::get('/maps/likeselect/{id}','AnimeController@likeSpotsselect');
Route::get('/maps/likeinsert/{id}','AnimeController@likeSpotInsert');