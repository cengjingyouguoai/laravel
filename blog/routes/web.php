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
    //修改排序
    Route::get('admin/type/update_sort','TypeController@updateSort');
    //修改名称
    Route::get('admin/type/update_name','TypeController@updateName');
    //删除
    Route::get('admin/type/del_type','TypeController@delType');
});
//后台文章
Route::group(['namespace' => 'Admin\Article','middleware' => 'check.login'],function(){
    //后台文章列表
    Route::get('admin/article/article_list','ArticleController@articleList');
    //文章增加页面
    Route::get('admin/article/add_article','ArticleController@addArticle');
    //增加文章处理
    Route::post('admin/article/add_article_deal','ArticleController@addArticleDeal');
    //点击标题查看文章
    Route::get('admin/article/article_details','ArticleController@articleDetails');
    //发表文章
    Route::get('admin/article/article_publish','ArticleController@articlePublish');
    //删除文章
    Route::get('admin/article/article_delete','ArticleController@articleDelete');
    //恢复文章
    Route::get('admin/article/article_regain','ArticleController@articleRegain');
});
