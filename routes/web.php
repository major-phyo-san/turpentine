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

Route::get('/', 'StaticPagesController@index');
Route::get('/home', 'StaticPagesController@index');

Route::get('/login/hall-user', 'Auth\LoginController@showHallUserLoginForm' );
Route::get('/register/hall-user', 'Auth\RegisterController@showHallUserRegisterForm' );

Route::get('/login/hall-owner', 'Auth\LoginController@showHallOwnerLoginForm' );
Route::get('/register/hall-owner', 'Auth\RegisterController@showHallOwnerRegisterForm' );

Route::post('/login/hall-user', 'Auth\LoginController@HallUserLogin');
Route::post('/register/hall-user', 'Auth\RegisterController@HallUserRegister');

Route::post('/login/hall-owner', 'Auth\LoginController@HallOwnerLogin');
Route::post('/register/hall-owner', 'Auth\RegisterController@HallOwnerRegister');

Route::get('/hall-user', 'StaticPagesController@HallUserLoggedIn');