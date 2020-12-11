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

//-----------AJAX kiem tra thong thin khi register
Route::post('register/ajax', [
    'as' => 'ajax.register',
    'uses' => 'AjaxController@ajaxRegister',
]);


Route::get('logout' ,[
	'as' => 'logout',
	'uses' => 'PageController@logout'
]);

Route::get('404' ,[
    'as' => '404',
    'uses' => 'PageController@pageNotFound'
]);

Route::get('404a' ,function(){
    return view('admin.404');
})->name('404a');
//----------------------------------

//-------------Admin
Route::middleware(['auth','checkRole'])->prefix('admin')->group(function () {
    Route::get('/', [
        // Matches The "/admin/" URL --------vao trang dashboard
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@dashboard',
    ]);

    Route::prefix('dashboard')->group(function(){
        Route::get('/', [
            // Matches The "/admin/dashboard/" URL
            'as' => 'admin.dashboard',
            'uses' => 'AdminController@dashboard',
        ]);
        Route::get('index', [
            // Matches The "/admin/dashboard/index" URL
            'as' => 'admin.dashboard',
            'uses' => 'AdminController@dashboard',
        ]);        
    });

    //-----------areas
    Route::middleware(['roommanager'])->prefix('areas')->group(function(){
        Route::get('/', [
            'as' => 'areas.index',
            'uses' => 'AreaController@index',
        ]);
        Route::post('/', [
            'as' => 'areas.store',
            'uses' => 'AreaController@store',
        ]);
        Route::get('{area}/edit', [
            'as' => 'areas.edit',
            'uses' => 'AreaController@edit',
        ]);
        Route::post('{area}', [
            'as' => 'areas.update',
            'uses' => 'AreaController@update',
        ]);
        Route::post('{area}/delete', [
            'as' => 'areas.destroy',
            'uses' => 'AreaController@destroy',
        ]);   
    });


    //-----------types room
    Route::middleware(['roommanager'])->prefix('typesroom')->group(function(){
        Route::get('/', [
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
    });

    
    //-----------room
    Route::middleware(['roommanager'])->prefix('rooms')->group(function(){
        Route::get('/', [
            'as' => 'rooms.index',
            'uses' => 'RoomController@index',
        ]);
        Route::get('create', [
            'as' => 'rooms.create',
            'uses' => 'RoomController@create',
        ]);
        Route::post('rooms', [
            'as' => 'rooms.store',
            'uses' => 'RoomController@store',
        ]);
        Route::get('{rooms}/edit', [
            'as' => 'rooms.edit',
            'uses' => 'RoomController@edit',
        ]);
        Route::post('{rooms}', [
            'as' => 'rooms.update',
            'uses' => 'RoomController@update',
        ]);
        Route::post('{rooms}/delete', [
            'as' => 'rooms.destroy',
            'uses' => 'RoomController@destroy',
        ]);
    });


    //-----------Account
    Route::middleware(['admin'])->prefix('users')->group(function(){
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'UserController@index',
        ]);
        Route::get('{user}', [
            'as' => 'users.show',
            'uses' => 'UserController@show',
        ]);
        Route::post('{users}/delete', [
            'as' => 'users.destroy',
            'uses' => 'UserController@destroy',
        ]);
    });

    //-------Role
    Route::middleware(['admin'])->prefix('role')->group(function(){
        Route::get('/', [
            'as' => 'admin.role',
            'uses' => 'AdminController@role',
        ]);
        Route::post('store', [
            'as' => 'admin.role.store',
            'uses' => 'AdminController@roleStore',
        ]);
        Route::post('role/destroy/{id}', [
            'as' => 'admin.role.destroy',
            'uses' => 'AdminController@roleDestroy',
        ]);
    });

    Route::post('changeRole', [
    	'as' => 'changeRole',
    	'uses' => 'AjaxController@changeRole',
    ]);
    Route::post('changeRoleUser', [
    	'as' => 'changeRoleUser',
    	'uses' => 'AdminController@changeRoleUser',
    ]);

    //-----------request from user
    Route::get('user/request', [
		// Matches The "/admin/request" URL
    	'as' => 'admin.users.request',
    	'uses' => 'AdminController@requestPage',
    ]);

    //---------booking
    Route::middleware(['roommanager'])->prefix('booking')->group(function(){
        Route::get('/', [
            'as' => 'booking.index',
            'uses' => 'BookingController@index',
        ]);
        Route::get('{booking}', [
            'as' => 'booking.show',
            'uses' => 'BookingController@show',
        ]);
        Route::post('{booking}', [
            'as' => 'booking.update',
            'uses' => 'BookingController@update',
        ]);
    });


    //-----cancel room
    Route::middleware(['roommanager'])->prefix('cancel')->group(function(){
        Route::get('/', [
            'as' => 'cancel.index',
            'uses' => 'BookingController@indexCancel',
        ]);
        Route::post('{booking}', [
            'as' => 'cancel.update',
            'uses' => 'BookingController@updateCancel',
        ]);
    });


    //-----request from user
    Route::middleware(['roommanager'])->prefix('request')->group(function(){
        Route::get('/', [
            'as' => 'request.index',
            'uses' => 'BookingController@indexRequest',
        ]);
        Route::get('{request}', [
            'as' => 'request.show',
            'uses' => 'BookingController@showRequest',
        ]);
        Route::post('{request}', [
            'as' => 'request.update',
            'uses' => 'BookingController@updateRequest',
        ]);
    });

    
    //-----review - rate 
    Route::prefix('review')->group(function(){
        Route::get('/', [
            'as' => 'admin.review.index',
            'uses' => 'AdminController@reviewIndex',
        ]);
        Route::get('{id}/destroy', [
            'as' => 'admin.review.destroy',
            'uses' => 'AdminController@reviewDestroy',
        ]);
    });


    //-------------notification
    Route::middleware(['roommanager'])->prefix('notification')->group(function () {
        Route::get('/', [
            'as' => 'admin.notification.index',
            'uses' => 'AdminController@indexNotification',
        ]);
        Route::get('update', [
            'as' => 'admin.notification.update',
            'uses' => 'AdminController@updateNotification',
        ]);
    });
});

//-------------Client
Route::middleware('auth')->prefix('client')->group(function () {
    Route::get('/', [
        'as' => 'client.dashboard',
        'uses' => 'ClientController@dashboard',
    ]);
    Route::get('dashboard', [
        // Matches The "/client/dashboard" URL
        'as' => 'client.dashboard',
        'uses' => 'ClientController@dashboard',
    ]);

    Route::get('information', [
        // Matches The "/client/dashboard" URL
        'as' => 'client.information',
        'uses' => 'ClientController@information',
    ]);

    Route::get('information/{id}/edit', [
        // Matches The "/client/dashboard" URL
        'as' => 'client.information.edit',
        'uses' => 'ClientController@edit',
    ]);

    Route::post('information/{id}', [
        // Matches The "/client/dashboard" URL
        'as' => 'client.information.update',
        'uses' => 'ClientController@update',
    ]);

    Route::get('information/changepassword', [
        // Matches The "/client/dashboard" URL
        'as' => 'client.password.edit',
        'uses' => 'ClientController@editPassword',
    ]);

    Route::post('information/{id}/changepassword', [
        // Matches The "/client/dashboard" URL
        'as' => 'client.password.update',
        'uses' => 'ClientController@updatePassword',
    ]);
    //--------------phòng--------------
    Route::get('room', [
        'as' => 'client.room',
        'uses' => 'ClientController@room',
    ]);

    Route::post('room/cancel/{id}', [
        'as' => 'client.room.cancel',
        'uses' => 'ClientController@roomCancel',
    ]);

    Route::post('request', [
        'as' => 'client.request',
        'uses' => 'ClientController@storeRequest',
    ]);

    /////////ajax tinh thanh - quan huyen - phuong xa
    Route::post('province',[
        'as' => 'province',
        'uses' => 'AjaxController@province'
    ]);
    Route::post('district',[
        'as' => 'district',
        'uses' => 'AjaxController@district'
    ]);

    //--------thong bao
    //-------------notification
    Route::prefix('notification')->group(function () {
        Route::get('/', [
            'as' => 'client.notification.index',
            'uses' => 'ClientController@indexNotification',
        ]);
        Route::get('update', [
            'as' => 'client.notification.update',
            'uses' => 'ClientController@updateNotification',
        ]);
        Route::get('update/all', [
            'as' => 'client.notification.update.all',
            'uses' => 'ClientController@updateAllNotification',
        ]);
    });

    Route::post('review', [
        'as' => 'review.store',
        'uses' => 'ClientController@storeReview',
    ]);
});