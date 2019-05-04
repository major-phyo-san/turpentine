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

Route::get('/login/hall-user', 'HallUserAuthController@showLoginForm' );
Route::get('/register/hall-user', 'HallUserAuthController@showRegisterForm' );

Route::get('/login/hall-owner', 'HallOwnerAuthController@showLoginForm' );
Route::get('/register/hall-owner', 'HallOwnerAuthController@showRegisterForm' );

Route::post('/login/hall-user', 'HallUserAuthController@HallUserLogin');
Route::post('/register/hall-user', 'HallUserAuthController@HallUserRegister');

Route::post('/login/hall-owner', 'HallOwnerAuthController@HallOwnerLogin');
Route::post('/register/hall-owner', 'HallOwnerAuthController@HallOwnerRegister');