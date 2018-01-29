<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});



Route::get('show', function () {

    return view('show/show');

});


Route::get('login/login','LoginController@login');

Route::get('login/qq', 'LoginController@qq');

Route::get('login/qq2', 'LoginController@qq2');



Route::get('index', 'IndexController@index');

Route::get('miaosha', 'IndexController@miaosha');
Route::get('url', 'IndexController@url');
Route::get('list', 'IndexController@list');
// Route::get('index', 'MiaoshaController@index');