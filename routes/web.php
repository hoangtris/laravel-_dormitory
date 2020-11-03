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


//----------------------------------
Route::get('login', [
	'as' => 'login',
	'uses' => 'PageController@index',
]);

Route::get('register', [
	'as' => 'register',
	'uses' => 'PageController@index',
]);
//----------------------------------
