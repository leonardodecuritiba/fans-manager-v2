<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('fans','FansController');
Route::get('count/fans','FansController@count');

Route::resource('admins','AdminsController');
Route::resource('clubs','ClubsController');
Route::get('visualizar/fans','FansController@visualizar');
Route::get('validar/fans/{fan}','FansController@validate_fan');
Route::post('logar','FansController@logar')->name('fans.logar');