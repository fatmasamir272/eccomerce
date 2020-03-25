<?php
Route::group(['perfix'=>'admin','namespace'=>'Admin'], function () { //bring al controllers  in namespace admin
Config::set('auth.defines','admin'); ////set admin guards from auth.php
Route::get('admin/login','AdminAuth@login'); //method of type get
Route::post('admin/login','AdminAuth@dologin'); //method of type post
Route::get('admin/forgot/password','AdminAuth@forgot_password');
Route::post('admin/forgot/password','AdminAuth@forgot_password_post');
Route::get('admin/reset/password/{token}','AdminAuth@reset_password');
Route::post('admin/reset/password/{token}','AdminAuth@reset_password_final');

Route::group(['middleware'=>'admin:admin'], function () { //:admin name of gaurd

Route::resource('admin/admin','Admincontroler'); //method of type get
Route::delete('admin/admin/destroy/all', 'Admincontroler@multi_delete'); ////multiple delete

Route::resource('admin/users', 'Userscontroller');
Route::delete('admin/users/destroy/all', 'Userscontroller@multi_delete');

Route::resource('admin/countries', 'CountriesController');
Route::delete('admin/countries/destroy/all', 'CountriesController@multi_delete');

Route::resource('admin/cities', 'CitiesController');
Route::delete('admin/cities/destroy/all', 'CitiesController@multi_delete');

Route::resource('admin/states', 'StatesController');
Route::delete('admin/states/destroy/all', 'StatesController@multi_delete');

Route::resource('admin/trademarks', 'TradeMarksController');
Route::delete('admin/trademarks/destroy/all', 'TradeMarksController@multi_delete');

Route::resource('admin/manufacturers', 'ManufacturersController');
Route::delete('admin/manufacturers/destroy/all', 'ManufacturersController@multi_delete');

Route::resource('admin/shipping', 'ShippingController');
Route::delete('admin/shipping/destroy/all', 'ShippingController@multi_delete');

Route::resource('admin/malls', 'MallsController');
Route::delete('admin/malls/destroy/all', 'MallsController@multi_delete');

Route::resource('admin/colors', 'ColorsController');
Route::delete('admin/colors/destroy/all', 'ColorsController@multi_delete');

Route::resource('admin/sizes', 'SizesController');
Route::delete('admin/sizes/destroy/all', 'SizesController@multi_delete');

Route::resource('admin/weights', 'WeightsController');
Route::delete('admin/weights/destroy/all', 'WeightsController@multi_delete');

Route::resource('admin/products', 'ProductsController');
Route::delete('admin/products/destroy/all', 'ProductsController@multi_delete');
Route::post('admin/upload/image/{id}', 'ProductsController@upload_file');
Route::post('admin/delete/image', 'ProductsController@delete_file');
Route::post('admin/update/image/{pid}', 'ProductsController@update_product_image');
Route::post('admin/delete/product/image/{pid}', 'ProductsController@delete_product_image');
Route::post('admin/load/weight/size', 'ProductsController@prepair_weight_size');

Route::resource('admin/news', 'NewsController');
Route::delete('admin/news/destroy/all', 'NewsController@multi_delete');
Route::post('admin/news/{id}', 'NewsController@add_comment');

Route::resource('admin/departments', 'DepartmentsController');

Route::get('admin/convertes', 'NewsController@convertes');


Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('admin/settings', 'Settings@setting');      ////////settings
Route::post('admin/settings', 'Settings@setting_save');////////settings
Route::any('admin/logout', 'AdminAuth@logout');

});

Route::get('admin/lang/{lang}', function ($lang) {
				session()->has('lang')?session()->forget('lang'):'';
				$lang == 'ar'?session()->put('lang', 'ar'):session()->put('lang', 'en');
				return back();
			});
});

 