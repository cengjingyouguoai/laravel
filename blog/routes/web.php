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
    Route::post('admin/login/login_deal','LoginController@loginDeal');

    //后台退出
    //Route::get('admin/login_out','LoginController@loginOut');

});
//后台首页
Route::group(['namespace' => 'Admin\Index','middleware' => 'check.login'],function(){
    //后台首页
    Route::get('admin/index/index','IndexController@index');
    //后台首页2
    Route::get('admin/index/index_2','IndexController@indexTwo');
});
//后台分类
Route::group(['namespace' => 'Admin\Type','middleware' => 'check.login'],function(){
    //后台分类列表
    Route::get('admin/type/type_list','TypeController@typeList');
    //后台分类编辑页面
    Route::get('admin/type/type_edit','TypeController@typeEdit');
    //编辑处理
    Route::post('admin/type/type_edit_deal','TypeController@typeEditDeal');
    //修改显示状态
    Route::get('admin/type/update_status','TypeController@updateStatus');
});
