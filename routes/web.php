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

Route::get('checkout', 'MasterController@getCheckout');
Route::get('restaurant/{id}/{title}', 'MasterController@getRestaurant');
Route::get('', 'MasterController@getHome');
Route::get('language/{name}', 'MasterController@getLanguage');
Route::get('verificate/{id}', 'MasterController@getVerificateId');
Route::group(['prefix' => 'user'], function () {
	Route::get('login', 'UserController@getLogin');
	Route::post('login', 'UserController@postLogin');
	Route::get('register', 'UserController@getRegister');
	Route::post('register', 'UserController@postRegister');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::group(['prefix' => 'user'], function () {
		Route::get('profile', 'admin\UserController@getProfile');
		Route::post('profile', 'admin\UserController@postProfile');
		Route::get('logout', 'admin\UserController@getLogout');
		Route::get('manage', 'admin\UserController@getManage');
		Route::post('role', 'admin\UserController@postRole');
	});
	Route::group(['prefix' => 'restaurant' , 'middleware' => ['can:restaurant_manager']], function () {
		Route::get('manage', 'MasterController@getRestaurantManage');
		Route::post('manage', 'MasterController@postRestaurantManage');
	});
	Route::get('log', 'MasterController@getLog');
});
Route::group(['prefix' => 'image'], function () {
	Route::get('user-profile/{id}/{name}', 'ImageController@getUserProfile');
});