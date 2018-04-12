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


//大后台登录
Route::group(['namespace' => 'Admin\Login'],function(){
    //登录页面
    Route::get('admin/login/login', 'LoginController@login');

    //登录判断
    //Route::post('admin/login_deal','LoginController@loginDeal');

    //后台退出
    //Route::get('admin/login_out','LoginController@loginOut');

});
//后台首页
Route::group(['namespace' => 'Admin\Index'],function(){
    //后台首页
    Route::get('admin/index/index','IndexController@index');
    //后台首页2
    Route::get('admin/index/index_2','IndexController@indexTwo');


});
