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

/*Route::group(['middleware' => 'Maintenance'], function () {
		Route::get('/', function () {
				return view('style.home');
			});
	});
/*Route::get('maintenance', function () {
		if (setting()->status == 'open') {
			return redirect('/');
		}
		return view('style.maintenance');
	});*/
Auth::routes();
Route::get('/facebook', function () {
				return view('home');
			});
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::get('/client/{provider}', 'SocialController@callback');
Route::get('/auth/redirect/facebook', function () {
				return view('face');
			});
Route::post('/facebook/post', 'SocialController@store');

