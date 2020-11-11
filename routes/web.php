<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
	'as' => 'index',
	'uses' => 'PageController@index',
]);

Route::get('about', [
	'as' => 'about',
	'uses' => 'PageController@about',
]);

Route::get('term', [
	'as' => 'term',
	'uses' => 'PageController@term',
]);

Route::get('contact', [
	'as' => 'contact',
	'uses' => 'PageController@contact',
]);

//----------------------------------
Route::get('rooms/all', [
	'as' => 'rooms.all',
	'uses' => 'PageController@roomsAll',
]);

Route::get('rooms/area/{slug}', [
	'as' => 'rooms.area',
	'uses' => 'PageController@roomsArea',
]);

Route::get('rooms/type/{slug}', [
	'as' => 'rooms.type',
	'uses' => 'PageController@roomsType',
]);

Route::get('rooms/type/{slug}', [
	'as' => 'rooms.type',
	'uses' => 'PageController@roomsType',
]);

Route::get('rooms/price/{slug}', [
	'as' => 'rooms.price',
	'uses' => 'PageController@roomsPrice',
]);

Route::get('rooms/search/{key}', [
	'as' => 'rooms.search',
	'uses' => 'PageController@roomsSearch',
]);

Route::get('rooms/detail/{id}', [
	'as' => 'rooms.detail',
	'uses' => 'PageController@roomsDetail',
]);


Route::post('checkout/{id}',[
	'as' =>'checkout',
	'uses' => 'PageController@checkout',
]);

Route::post('payment',[
	'as' =>'payment',
	'uses' => 'PageController@payment',
]);

Route::get('checkoutsucess',[
	'as' =>'checkout.success',
	'uses' => 'PageController@checkoutsuccess',
]);

Route::get('total',[
	'as' =>'total',
	'uses' => 'AjaxController@total',
]);


//----------------------------------
Route::get('login', [
	'as' => 'login',
	'uses' => 'PageController@login',
]);

Route::post('login', [
	'as' => 'login',
	'uses' => 'PageController@postlogin',
]);

Route::get('register', [
	'as' => 'register',
	'uses' => 'PageController@register',
]);

Route::post('register', [
	'as' => 'register',
	'uses' => 'PageController@postregister',
]);

Route::get('logout' ,[
	'as' => 'logout',
	'uses' => 'PageController@logout'
]);
//----------------------------------

//-------------Admin
Route::prefix('admin')->group(function () {
	Route::get('/', [
    	'as' => 'admin.dashboard',
    	'uses' => 'AdminController@dashboard',
    ]);
    Route::get('dashboard', [
		// Matches The "/admin/dashboard" URL
    	'as' => 'admin.dashboard',
    	'uses' => 'AdminController@dashboard',
    ]);

    Route::get('permission', [
		// Matches The "/admin/dashboard" URL
    	'as' => 'admin.permission',
    	'uses' => 'AdminController@permission',
    ]);

    Route::resource('areas', 'AreaController');
    Route::resource('typesroom', 'TypeRoomController');
    Route::resource('rooms', 'RoomController');
    Route::resource('users', 'UserController');
});