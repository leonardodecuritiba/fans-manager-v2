<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::resource('fans','FansController');
Route::get('count/fans','FansController@count');

Route::resource('admins','AdminsController');
Route::resource('clubs','ClubsController');
Route::get('visualizar/fans','FansController@visualizar');
Route::get('validar/fans/{fan}/{token}','FansController@validate_fan')->name('validar.fans');
Route::post('logar','FansController@logar')->name('fans.logar');

















//Testando o envio de email
Route::get('sendemail', function () {
    $user = array(
        'email' => "silva.zanin@gmail.com",
        'name' => "LEO",
        'mensagem' => "olá",
    );
    Mail::raw($user['mensagem'], function($message) use ($user) {
        $message->to($user['email'], $user['name'])->subject('Welcome!');
        $message->from('xxx@gmail.com', 'Atendimento');
    });

    return "Your email has been sent successfully";
});