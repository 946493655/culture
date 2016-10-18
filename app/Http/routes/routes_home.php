<?php
/**
 * 这里是前台页面路由
 */

//Route::get('home',function(){
//    return 'home';
//});

Route::group(['prefix'=>'/','namespace'=>'Home'],function(){
    //前台首页路由
    Route::any('/','HomeController@index');
    Route::any('home','HomeController@index');
    //产品样片
    Route::any('product','ProductController@index');
    Route::get('product/{id}','ProductController@show');
    Route::get('product/click/{id}/{num}','ProductController@setClick');
    Route::get('product/video/{id}/{videoid}','ProductController@video');
    //在线作品
    Route::post('creation/addEffect','CreationController@insertEffect');     //效果定制添加
    Route::post('creation/editLayer/{id}','CreationController@updateLayer');     //动画模板修改意见更新
    Route::get('creation/edit/{id}','CreationController@editLayer');     //动画模板修改意见
    Route::get('creation/s/{genre}/{cate}/{order}','CreationController@index');     //用户的成片列表
    Route::get('creation/s/{genre}/{cate}','CreationController@index');
    Route::get('creation','CreationController@index');
    Route::get('creation/pre/{id}','CreationController@pre');
    //分镜画面
    Route::get('storyboard/like/{way}/{id}','StoryBoardController@like');
    Route::get('storyboard/{id}','StoryBoardController@show');
    Route::get('storyboard/w/{way}/{cate}','StoryBoardController@index');      //w条件检索方式
    Route::any('storyboard','StoryBoardController@index');
    //供应单位
    Route::get('{genre}/supply','SupplyController@index');
    Route::any('supply','SupplyController@index');
    //需求信息
    Route::get('demand/genre/{genre}','DemandController@index');
    Route::any('demand','DemandController@index');
    //娱乐频道
    Route::get('entertain/{genre0}/{genre}','EntertainController@index');
    Route::any('entertain','EntertainController@index');
    Route::get('entertain/{id}','EntertainController@show');
    Route::get('entertain/staff/show/{id}','EntertainController@staffShow');
    Route::get('entertain/works/show/{id}','EntertainController@worksShow');
    //租赁频道
    Route::get('rent/SD/{genre}','RentController@index');
    Route::get('rent/s/{type}/{from}/{to}','RentController@index');     //s代表检索
    Route::resource('rent','RentController');
    //设计频道
    Route::get('design/cate/{cate}','DesignController@index');
    Route::resource('design','DesignController');
    //关于我们
    Route::any('about','AboutController@index');
    Route::get('about/join','AboutController@join');
    //用户心声
    Route::resource('uservoice','UserVoiceController');
    //用户对本站的意见栏
    Route::post('opinion/status/{id}','OpinionController@setStatus');
    Route::get('opinion/status/{id}','OpinionController@getStatus');
    Route::post('opinion/{id}','OpinionController@update');
    Route::get('{status}/opinion','OpinionController@index');
    Route::resource('opinion','OpinionController');
    //创意路由
    Route::get('idea/click/{id}/{click}','IdeaController@click');
    Route::get('idea/collect/{id}/{collect}','IdeaController@collect');
    Route::get('idea/cate/{cate}','IdeaController@index');
    Route::resource('idea','IdeaController');
    //话题路由
    Route::post('talk/{id}','TalkController@update');
    Route::get('talk/mytalk','TalkController@mytalk');
    Route::get('talk/follow','TalkController@follow');
    Route::get('talk/collect','TalkController@collect');
    Route::get('talk/tofollow','TalkController@tofollow');
    Route::get('talk/tothank','TalkController@tothank');
    Route::get('talk/toclick','TalkController@toclick');
    Route::get('talk/toshare','TalkController@toshare');
    Route::get('talk/toreport','TalkController@toreport');
    Route::get('talk/tocollect','TalkController@tocollect');
    Route::get('talk/mycollect/{id}','TalkController@tomycollect');
    Route::get('talk/{id}/destroy','TalkController@destroy');
    Route::get('talk/{id}/restore','TalkController@restore');
    Route::get('talk/{id}/forceDelete','TalkController@forceDelete');
    Route::get('talk/theme/{themeid}','TalkController@index');
    Route::resource('talk','TalkController');
    //话题专栏路由
    Route::get('theme/u/{uid}','ThemeController@index');
    Route::resource('theme','ThemeController');
    //新手帮助路由
    Route::resource('newuser','NewUserController');
    //搜索栏
    Route::get('s/{genre}/{keyword}','SearchController@index');
    Route::get('s/init','SearchController@init');      //搜索表初始化
});