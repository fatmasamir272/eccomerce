<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace'=>'Admin\Api'], function () { //bring al controllers  in namespace admin

Route::group(['middleware'=>'auth:api'], function () { 
Route::get('/user', function (Request $request) { return $request->user(); });

Route::get('all/news','NewsController@all_news' );
Route::get('news/{news_id}','NewsController@news' );
Route::post('add/comment','NewsController@add_comment' );

});
Route::post('login','Users@login'); //method of type post

});