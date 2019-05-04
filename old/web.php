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

Route::get('/', function(){
	return view('index');
});
Auth::routes();

Route::get('/login/hall-owner', 'Auth\LoginController@showHallOwnerLoginForm');
Route::get('/login/hall-user', 'Auth\LoginController@showHallUserLoginForm');
Route::get('/register/hall-owner', 'Auth\RegisterController@showHallOwnerRegisterForm');
Route::get('/register/hall-user', 'Auth\RegisterController@showHallUserRegisterForm');

Route::post('/login/hall-owner', 'Auth\LoginController@HallOwnerLogin');
Route::post('/login/hall-user', 'Auth\LoginController@HallUserLogin');
Route::post('/register/hall-owner', 'Auth\RegisterController@createHallOwner');
Route::post('/register/hall-user', 'Auth\RegisterController@createHallUser');

Route::view('/home', 'home')->middleware('auth');
Route::view('/hall-owner', 'hall-owner');
Route::view('/hall-user', 'hall-user');
