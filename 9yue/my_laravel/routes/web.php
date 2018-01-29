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

Route::get('/', function () {
    return view('welcome');
});

// Route::any('test', ['user' => 'DemoController@index']);


// 登录
Route::get('login', function () {
    return view('demo/login');
});

//登录处理
Route::any('logindo','DemoController@loginDoo');

//添加
// Route::any('test',['User'=>'DemoController@index']);
Route::any('test','DemoController@index');
//删除
Route::get('del','DemoController@delone');

//修改
Route::get('up','DemoController@up');
