<?php

//Route::get('member',function(){
//    return 'member';
//});

/**
 * 这里是注册、登陆路由
 */
Route::group(['prefix'=>'login'], function(){
    Route::resource('/','LoginController');
    Route::resource('dologin','LoginController@dologin');
    Route::resource('dologout','LoginController@dologout');
});
Route::group(['prefix'=>'regist'], function(){
    Route::resource('/','RegisterController');
    Route::resource('doregist','RegisterController@doregist');
    Route::get('success','RegisterController@success');
});


/**
 * 这里是会员路由
 */
Route::group(['prefix'=>'member','middleware' =>'MemberAuth','namespace'=>'Member'], function(){
//Route::group(['prefix'=>'member','namespace'=>'Member'], function(){
    //账户首页
    Route::get('/','HomeController@index');
    Route::get('/home','HomeController@index');
    //会员账户
        //会员认证
    Route::get('setting','SettingController@show');
    Route::get('setting/{id}/auth','SettingController@auth');
    Route::post('setting/{id}','SettingController@update');
    Route::get('setting/pwd/{id}','SettingController@pwd');
    Route::post('setting/updatepwd/{id}','SettingController@updatepwd');
    Route::get('setting/info/{id}','SettingController@info');
    Route::post('setting/updateinfo/{id}','SettingController@updateinfo');
//    Route::resource('setting','SettingController');
    //个人设计师、制作企业、经纪公司、租赁公司认证
    //在线视频制作
    Route::get('product/trash','ProductController@trash');
    Route::get('product/{id}/destroy','ProductController@destroy');
    Route::get('product/{id}/restore','ProductController@restore');
    Route::get('product/{id}/forceDelete','ProductController@forceDelete');
    Route::post('product/{id}','ProductController@update');
    Route::resource('product','ProductController');
        //产品属性
    Route::get('productattr/{id}/edit2','ProductAttrController@edit2');
    Route::post('productattr/{id}/update2','ProductAttrController@update2');
    Route::get('productattr/{id}/edit3','ProductAttrController@edit3');
    Route::post('productattr/{id}/update3','ProductAttrController@update3');
    Route::get('productattr/{id}/edit4','ProductAttrController@edit4');
    Route::post('productattr/{id}/update4','ProductAttrController@update4');
    Route::get('productattr/{id}/edit5','ProductAttrController@edit5');
    Route::post('productattr/{id}/update5','ProductAttrController@update5');
    Route::get('productattr/trash','ProductAttrController@trash');
    Route::get('productattr/{id}/destroy','ProductAttrController@destroy');
    Route::get('productattr/{id}/restore','ProductAttrController@restore');
    Route::get('productattr/{id}/forceDelete','ProductAttrController@forceDelete');
    Route::post('productattr/{id}','ProductAttrController@update');
    Route::resource('productattr','ProductAttrController');
    Route::get('productattr/{id}/{index}','ProductAttrController@show2');
        //产品动画
    Route::get('productlayer/trash','ProductLayerController@trash');
    Route::get('productlayer/{id}/destroy','ProductLayerController@destroy');
    Route::get('productlayer/{id}/restore','ProductLayerController@restore');
    Route::get('productlayer/{id}/forceDelete','ProductLayerController@forceDelete');
    Route::post('productlayer/{id}','ProductLayerController@update');
    Route::resource('productlayer','ProductLayerController');
        //产品内容
    Route::get('productcon/trash','ProductConController@trash');
    Route::get('productcon/{id}/destroy','ProductConController@destroy');
    Route::get('productcon/{id}/restore','ProductConController@restore');
    Route::get('productcon/{id}/forceDelete','ProductConController@forceDelete');
    Route::post('productcon/{id}','ProductConController@update');
    Route::resource('productcon','ProductConController');
        //动画属性
    Route::get('{layerid}/proLayerAttr/{id}/destroy','ProductLayerAttrController@destroy');
    Route::get('{layerid}/proLayerAttr/{id}/restore','ProductLayerAttrController@restore');
    Route::get('{layerid}/proLayerAttr/{id}/forceDelete','ProductLayerAttrController@forceDelete');
    Route::post('{layerid}/proLayerAttr/{id}','ProductLayerAttrController@update');
    Route::resource('{layerid}/proLayerAttr','ProductLayerAttrController');
    //个人供求
        //个人需求
    Route::post('personD/{id}','PersonDController@update');
    Route::get('personD/trash','PersonDController@trash');
    Route::get('personD/{id}/destroy','PersonDController@destroy');
    Route::get('personD/{id}/restore','PersonDController@restore');
    Route::get('personD/{id}/forceDelete','PersonDController@forceDelete');
    Route::resource('personD','PersonDController');
        //作品供应
    Route::post('personS/{id}','PersonSController@update');
    Route::get('personS/trash','PersonSController@trash');
    Route::get('personS/{id}/destroy','PersonSController@destroy');
    Route::get('personS/{id}/restore','PersonSController@restore');
    Route::get('personS/{id}/forceDelete','PersonSController@forceDelete');
    Route::resource('personS','PersonSController');
        //作品类型
//    Route::post('category/{id}','CategoryController@update');
//    Route::get('category/trash','CategoryController@trash');
//    Route::get('category/{id}/destroy','CategoryController@destroy');
//    Route::get('category/{id}/restore','CategoryController@restore');
//    Route::get('category/{id}/forceDelete','CategoryController@forceDelete');
//    Route::resource('category','CategoryController');
    //企业供求
        //企业需求
    Route::post('companyD/{id}','CompanyDController@update');
    Route::get('companyD/{id}/destroy','CompanyDController@destroy');
    Route::get('companyD/{id}/restore','CompanyDController@restore');
    Route::get('companyD/{id}/forceDelete','CompanyDController@forceDelete');
    Route::get('companyD/trash','CompanyDController@trash');
    Route::resource('companyD','CompanyDController');
        //企业产品
    Route::post('companyS/{id}','CompanySController@update');
    Route::get('companyS/{id}/destroy','CompanySController@destroy');
    Route::get('companyS/{id}/restore','CompanySController@restore');
    Route::get('companyS/{id}/forceDelete','CompanySController@forceDelete');
    Route::get('companyS/trash','CompanySController@trash');
    Route::resource('companyS','CompanySController');
        //租赁供求
    Route::post('rent/{id}','RentController@update');
    Route::get('rent/{id}/destroy','RentController@destroy');
    Route::get('rent/{id}/restore','RentController@restore');
    Route::get('rent/{id}/forceDelete','RentController@forceDelete');
    Route::get('rent/trash','RentController@trash');
    Route::get('{genre}/rent','RentController@index');
    Route::resource('rent','RentController');
        //娱乐供求
    Route::post('entertainS/{id}','EntertainSController@update');
    Route::get('entertainS/{id}/destroy','EntertainSController@destroy');
    Route::get('entertainS/{id}/restore','EntertainSController@restore');
    Route::get('entertainS/{id}/forceDelete','EntertainSController@forceDelete');
    Route::get('entertainS/trash','EntertainSController@trash');
    Route::resource('entertainS','EntertainSController');
        //创意管理
    Route::post('idea/{id}','IdeaController@update');
    Route::get('idea/{id}/destroy','IdeaController@destroy');
    Route::get('idea/{id}/restore','IdeaController@restore');
    Route::get('idea/{id}/forceDelete','IdeaController@forceDelete');
    Route::get('idea/trash','IdeaController@trash');
    Route::get('idea/user/{id}','IdeaController@ideaShow');
    Route::get('idea/user/{id}/{uid}','IdeaController@setIdeaShow');
    Route::resource('idea','IdeaController');
        //娱乐员工管理
    Route::resource('staff','StaffController');
        //图片管理
    Route::post('pic/{id}','PicController@update');
    Route::get('pic/{id}/destroy','PicController@destroy');
    Route::get('pic/{id}/restore','PicController@restore');
    Route::get('pic/{id}/forceDelete','PicController@forceDelete');
    Route::get('pic/trash','PicController@trash');
    Route::resource('pic','PicController');
        //视频管理
    Route::post('video/{id}','VideoController@update');
    Route::get('video/{id}/destroy','VideoController@destroy');
    Route::get('video/{id}/restore','VideoController@restore');
    Route::get('video/{id}/forceDelete','VideoController@forceDelete');
    Route::get('video/trash','VideoController@trash');
    Route::get('video/uploadWay','VideoController@uploadWay');
    Route::get('video/leplay/{leplay}','VideoController@setLeplay');
    Route::resource('video','VideoController');
        //分镜路由
    Route::get('storyboard/trash','StoryBoardController@trash');
    Route::get('storyboard/{id}/destroy','StoryBoardController@destroy');
    Route::get('storyboard/{id}/restore','StoryBoardController@restore');
    Route::get('storyboard/{id}/forceDelete','StoryBoardController@forceDelete');
    Route::post('storyboard/{id}','StoryBoardController@update');
    Route::resource('storyboard','StoryBoardController');
        //个人设计供应
    Route::post('designPerS/{id}','DesignPerSController@update');
    Route::get('designPerS/trash','DesignPerSController@trash');
    Route::get('designPerS/{id}/destroy','DesignPerSController@destroy');
    Route::resource('{cate}/designPerS','DesignPerSController');
    Route::resource('designPerS','DesignPerSController');
        //个人设计需求
    Route::post('designPerD/{id}','DesignPerDController@update');
    Route::get('designPerD/trash','DesignPerDController@trash');
    Route::get('designPerD/{id}/destroy','DesignPerDController@destroy');
    Route::resource('designPerD','DesignPerDController');
        //公司设计供应
    Route::post('designComS/{id}','DesignComSController@update');
    Route::get('designComS/trash','DesignComSController@trash');
    Route::get('designComS/{id}/destroy','DesignComSController@destroy');
    Route::resource('designComS','DesignComSController');
        //公司设计需求
    Route::post('designComD/{id}','DesignComDController@update');
    Route::get('designComD/trash','DesignComDController@trash');
    Route::get('designComD/{id}/destroy','DesignComDController@destroy');
    Route::resource('designComD','DesignComDController');
    //订单路由
        //订单流程
    Route::post('order/pay','OrderController@setPay');
    Route::get('order/paystatus/{id}','OrderController@setOrderStatus');
    Route::get('order/getPay/{id}/{cate}/{status}','OrderController@setPayStatus');
    Route::get('order/{id}/{status}','OrderController@setStatus');
    Route::post('order/tosure','OrderController@tosure');
    Route::post('order/create','OrderController@create');
    Route::resource('order','OrderController');
        //售后（样片修改）路由
    Route::resource('orderfirm','OrderFirmController');
        //在线创作路由
    Route::resource('orderpro','OrderProductController');
        //话题管理
    Route::resource('talk','TalkController');
    Route::get('talk/i/{index}','TalkController@index');      //i代表index
//    Route::get('talk/click','TalkController@click');
//    Route::get('talk/collect','TalkController@collect');
//    Route::get('talk/follow','TalkController@follow');
//    Route::get('talk/reply','TalkController@reply');
//    Route::get('talk/share','TalkController@share');
//    Route::get('talk/thank','TalkController@thank');
});