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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/components', 'ProfilesController@viewAllComponents');

Route::get('/profile/{user}', 'ProfilesController@index');

Route::get('/edit/{user}', 'ProfilesController@edit');

Route::get('/delete/{user}', 'ProfilesController@destroy');

Route::patch('/editProfile/save/{profile}', 'ProfilesController@save');
