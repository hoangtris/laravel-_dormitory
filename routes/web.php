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

Route::get('rooms/price/{slug}', [
	'as' => 'rooms.price',
	'uses' => 'PageController@roomsPrice',
]);

Route::get('rooms/search', [
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

Route::get('checkoutsuccess',[
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

Route::get('404' ,[
    'as' => '404',
    'uses' => 'PageController@pageNotFound'
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

    //-----------areas
    Route::get('areas', [
    	'as' => 'areas.index',
    	'uses' => 'AreaController@index',
    ]);
    Route::post('areas', [
    	'as' => 'areas.store',
    	'uses' => 'AreaController@store',
    ]);
    Route::get('areas/{area}/edit', [
    	'as' => 'areas.edit',
    	'uses' => 'AreaController@edit',
    ]);
    Route::post('areas/{area}', [
    	'as' => 'areas.update',
    	'uses' => 'AreaController@update',
    ]);
    Route::post('areas/{area}/delete', [
    	'as' => 'areas.destroy',
    	'uses' => 'AreaController@destroy',
    ]);

    //-----------types room
    Route::get('typesroom', [
    	'as' => 'typesroom.index',
    	'uses' => 'TypeRoomController@index',
    ]);
    Route::post('typesroom', [
    	'as' => 'typesroom.store',
    	'uses' => 'TypeRoomController@store',
    ]);
    Route::get('typesroom/{typesroom}/edit', [
    	'as' => 'typesroom.edit',
    	'uses' => 'TypeRoomController@edit',
    ]);
    Route::post('typesroom/{typesroom}', [
    	'as' => 'typesroom.update',
    	'uses' => 'TypeRoomController@update',
    ]);
    Route::post('typesroom/{typesroom}/delete', [
    	'as' => 'typesroom.destroy',
    	'uses' => 'TypeRoomController@destroy',
    ]);
    
    //-----------room
    Route::get('rooms', [
    	'as' => 'rooms.index',
    	'uses' => 'RoomController@index',
    ]);
    Route::get('rooms/create', [
    	'as' => 'rooms.create',
    	'uses' => 'RoomController@create',
    ]);
    Route::post('rooms', [
    	'as' => 'rooms.store',
    	'uses' => 'RoomController@store',
    ]);
    Route::get('rooms/{rooms}/edit', [
    	'as' => 'rooms.edit',
    	'uses' => 'RoomController@edit',
    ]);
    Route::post('rooms/{rooms}', [
    	'as' => 'rooms.update',
    	'uses' => 'RoomController@update',
    ]);
    Route::post('rooms/{rooms}/delete', [
    	'as' => 'rooms.destroy',
    	'uses' => 'RoomController@destroy',
    ]);

    //-----------Account
    Route::get('users', [
    	'as' => 'users.index',
    	'uses' => 'UserController@index',
    ]);
    Route::get('users/{user}', [
    	'as' => 'users.show',
    	'uses' => 'UserController@show',
    ]);
    Route::post('users/{users}/delete', [
    	'as' => 'users.destroy',
    	'uses' => 'UserController@destroy',
    ]);

    Route::get('role', [
		// Matches The "/admin/role" URL
    	'as' => 'admin.role',
    	'uses' => 'AdminController@role',
    ]);
    Route::post('role/store', [
		// Matches The "/admin/role/store" URL
    	'as' => 'admin.role.store',
    	'uses' => 'AdminController@roleStore',
    ]);
    
    Route::post('role/destroy/{id}', [
		// Matches The "/admin/role/store" URL
    	'as' => 'admin.role.destroy',
    	'uses' => 'AdminController@roleDestroy',
    ]);
    Route::post('changeRole', [
		// Matches The "/admin/role/store" URL
    	'as' => 'changeRole',
    	'uses' => 'AjaxController@changeRole',
    ]);
    Route::post('changeRoleUser', [
		// Matches The "/admin/role/store" URL
    	'as' => 'changeRoleUser',
    	'uses' => 'AdminController@changeRoleUser',
    ]);

    Route::get('user/request', [
		// Matches The "/admin/request" URL
    	'as' => 'admin.users.request',
    	'uses' => 'AdminController@requestPage',
    ]);

    //---------booking
    Route::get('booking', [
    	'as' => 'booking.index',
    	'uses' => 'BookingController@index',
    ]);
    Route::get('booking/{booking}', [
    	'as' => 'booking.show',
    	'uses' => 'BookingController@show',
    ]);
    Route::post('booking/{booking}', [
    	'as' => 'booking.update',
    	'uses' => 'BookingController@update',
    ]);
    
    //-----review - rate 
    Route::get('review', [
		// Matches The "/admin/request" URL
    	'as' => 'admin.review.index',
    	'uses' => 'AdminController@reviewIndex',
    ]);
    Route::get('review/destroy/{id}', [
		// Matches The "/admin/request" URL
    	'as' => 'admin.review.destroy',
    	'uses' => 'AdminController@reviewDestroy',
    ]);
});