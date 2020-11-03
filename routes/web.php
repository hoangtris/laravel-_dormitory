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
	'uses' => 'PageController@index',
]);

Route::get('term', [
	'as' => 'term',
	'uses' => 'PageController@index',
]);

Route::get('contact', [
	'as' => 'contact',
	'uses' => 'PageController@index',
]);

//----------------------------------
Route::get('collections/all', [
	'as' => 'collections',
	'uses' => 'PageController@index',
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
