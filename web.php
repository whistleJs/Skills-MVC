<?php

use src\App\Route;

Route::get('/', 'ViewController@index');

if (user()) {
    
    Route::get('/user/logout', 'UserController@logout');

} else {

    Route::get('/user/join', 'ViewController@join');
    Route::get('/user/login', 'ViewController@login');

    Route::post('/user/join', 'UserController@join');
    Route::post('/user/login', 'UserController@login');

}