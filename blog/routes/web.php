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

//前台
Route::group(['namespace' => 'Home\Index'],function(){
    //首页
    Route::get('/', 'IndexController@index');
});

//前台分类
Route::group(['namespace' => 'Home\Type'],function(){
    //首页
    Route::get('type/type_list', 'TypeController@typeList');
});

//前台文章详情
Route::group(['namespace' => 'Home\Article'],function(){
    //首页
    Route::get('article/article_list', 'ArticleController@articleList');
    //点赞功能
    Route::get('article/article_add_yea','ArticleController@articleAddYea');
});

//前台文章评论
Route::group(['namespace' => 'Home\Comment'],function(){
    //首页
    Route::post('comment/comment_add', 'CommentController@commentAdd');
});

//前台文章回复
Route::group(['namespace' => 'Home\Recomment'],function(){
    //首页
    Route::post('recomment/recomment_add', 'RecommentController@RecommentAdd');
});



//大后台登录
Route::group(['namespace' => 'Admin\Login'],function(){
    //登录页面
    Route::get('admin/login/login', 'LoginController@login');

    //登录判断
    Route::post('admin/login/login_deal','LoginController@loginDeal');

    //后台退出
    Route::get('admin/login/login_out','LoginController@loginOut');

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
//管理员
Route::group(['namespace' => 'Admin\Admin','middleware' => 'check.login'],function(){
    //后台管理员列表
    Route::get('admin/admin/admin_list','AdminController@adminList');
    //后台管理员修改页面
    Route::get('admin/admin/admin_update','AdminController@adminUpdate');
    //后台管理员修改处理
    Route::post('admin/admin/admin_update_deal','AdminController@adminUpdateDeal');
});

//后台小标题
Route::group(['namespace' => 'Admin\Title','middleware' => 'check.login'],function(){
    //座右铭列表页
    Route::get('admin/title/title_list','TitleController@titleList');
    //座右铭增加页面
    Route::get('admin/title/title_edit','TitleController@titleEdit');
    //座右铭增加处理
    Route::post('admin/title/title_edit_deal','TitleController@titleEditDeal');
    //座右铭删除
    Route::get('admin/title/title_edit_delete','TitleController@titleEditDelete');
    //座右铭修改
    Route::post('admin/title/title_edit_update','TitleController@titleEditUpdate');
});

//后台个人名片
Route::group(['namespace' => 'Admin\Card','middleware' => 'check.login'],function(){
    //个人名片表页
    Route::get('admin/card/card_list','CardController@cardList');
    //个人名片增加页面
    Route::get('admin/card/card_edit','CardController@cardEdit');
    //座右铭增加处理
  Route::any('admin/card/card_edit_deal','CardController@cardEditDeal');
    /*  //座右铭删除
  Route::get('admin/title/title_edit_delete','TitleController@titleEditDelete');
  //座右铭修改
  Route::post('admin/title/title_edit_update','TitleController@titleEditUpdate');*/
});
