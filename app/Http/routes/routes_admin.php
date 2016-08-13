<?php
/**
 * 系统后台权限
 */
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function(){
    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@dologin');
    Route::get('logout', 'LoginController@dologout');
});

/**
 * 这里是系统后台路由
 */
Route::group(['prefix'=>'admin','middleware' => 'AdminAuth','namespace'=>'Admin'],function(){
//Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //系统后台首页路由
    Route::get('/','HomeController@index');
    Route::get('home','HomeController@index');
    //权限管理
        //管理员路由
    Route::post('admin/{id}','AdminController@update');
    Route::get('admin/{id}/forceDelete','AdminController@forceDelete');
    Route::resource('admin','AdminController');
        //角色路由
    Route::post('role/{id}','RoleController@update');
    Route::get('role/{id}/forceDelete','RoleController@forceDelete');
    Route::resource('role','RoleController');
        //操作路由
    Route::get('action/create/{pid}','ActionController@create');
    Route::post('action/{id}','ActionController@update');
    Route::get('action/increase/{id}','ActionController@increase');
    Route::get('action/reduce/{id}','ActionController@reduce');
    Route::get('action/trash','ActionController@trash');
    Route::get('action/{id}/destroy','ActionController@destroy');
    Route::get('action/{id}/restore','ActionController@restore');
    Route::get('action/{id}/forceDelete','ActionController@forceDelete');
    Route::resource('action','ActionController');
        //用户权限分配
    Route::resource('authorization','AuthorizationController');
        //前台功能
    Route::post('function/{id}','FunctionController@update');
    Route::get('function/trash','FunctionController@trash');
    Route::resource('function','FunctionController');
        //前台左侧菜单链接功能
    Route::post('menus/{id}','MenusController@update');
    Route::get('menus/{id}/forceDelete','MenusController@forceDelete');
    Route::get('menus/trash','MenusController@trash');
    Route::get('{type}/menus/trash','MenusController@trash');
    Route::get('{type}/menus','MenusController@index');
    Route::resource('menus','MenusController');
    //资料审核
        //会员管理
    Route::get('user/toauth/{id}','UserController@toauth');
    Route::get('user/noauth/{id}','UserController@noauth');
    Route::get('user/increase/{id}','UserController@increase');
    Route::get('user/reduce/{id}','UserController@reduce');
    Route::get('user/limit/{id}/{limit}','UserController@limit');
    Route::post('user/{id}','UserController@update');
    Route::get('{data}/user','UserController@index');
    Route::resource('user','UserController');
    //作品管理（制作公司和设计师的）
    Route::get('{type}/goods','GoodsController@index');
    Route::resource('goods','GoodsController');
    //内部产品管理
    Route::get('product/trash','ProductController@trash');
    Route::post('product/{id}','ProductController@update');
    Route::resource('product','ProductController');
        //内部产品动画层级路由
    Route::post('productlayer/{id}','ProductLayerController@update');
    Route::resource('productlayer','ProductLayerController');
        //内部产品属性路由
    Route::get('productattr/{id}/edit2','ProductAttrController@edit2');
    Route::post('productattr/{id}/update2','ProductAttrController@update2');
    Route::get('productattr/{id}/edit3','ProductAttrController@edit3');
    Route::post('productattr/{id}/update3','ProductAttrController@update3');
    Route::get('productattr/{id}/edit4','ProductAttrController@edit4');
    Route::post('productattr/{id}/update4','ProductAttrController@update4');
    Route::get('productattr/{id}/edit5','ProductAttrController@edit5');
    Route::post('productattr/{id}/update5','ProductAttrController@update5');
    Route::get('productattr/{id}/destroy','ProductAttrController@destroy');
    Route::get('productattr/{id}/restore','ProductAttrController@restore');
    Route::get('productattr/{id}/forceDelete','ProductAttrController@forceDelete');
    Route::get('productattr/trash','ProductAttrController@trash');
    Route::post('productattr/{id}','ProductAttrController@update');
    Route::resource('productattr','ProductAttrController');
    Route::get('productattr/{id}/{index}','ProductAttrController@show2');
    //产品动画的图片文字路由
    Route::get('productcon/trash','ProductConController@trash');
    Route::post('productcon/{id}','ProductConController@update');
    Route::resource('productcon','ProductConController');
        //动画属性路由
    Route::get('{layerid}/prolayerattr/{id}/forceDelete','ProductLayerAttrController@forceDelete');
    Route::post('{layerid}/prolayerattr/{id}','ProductLayerAttrController@update');
    Route::resource('{layerid}/prolayerattr','ProductLayerAttrController');
        //产品类型路由
//    Route::get('category/{id}/destroy','CategoryController@destroy');
//    Route::get('category/{id}/restore','CategoryController@restore');
//    Route::get('category/{id}/forceDelete','CategoryController@forceDelete');
//    Route::post('category/{id}','CategoryController@update');
//    Route::resource('category','CategoryController');
    //租赁路由
    Route::post('rent/{id}','RentController@update');
    Route::resource('rent','RentController');
    //娱乐路由
    Route::post('entertain/{id}','EntertainController@update');
    Route::resource('entertain','EntertainController');
        //娱乐员工管理
    Route::get('staff/{id}/destroy','StaffController@destroy');
    Route::get('staff/{id}/restore','StaffController@restore');
    Route::get('staff/{id}/forceDelete','StaffController@forceDelete');
    Route::post('staff/{id}','StaffController@update');
    Route::resource('staff','StaffController');
        //作品管理
    Route::get('works/{id}/destroy','WorksController@destroy');
    Route::get('works/{id}/restore','WorksController@restore');
    Route::get('works/{id}/forceDelete','WorksController@forceDelete');
    Route::get('works/{id}/sort/{sort}','WorksController@sort');
    Route::resource('works','WorksController');
    //设计路由
    Route::post('design/{id}','DesignController@update');
    Route::get('design/trash','DesignController@trash');
    Route::resource('design','DesignController');
    //功能管理
        //消息管理
    Route::get('message/trash','MessageController@trash');
    Route::resource('message','MessageController');
        //链接管理
    Route::post('link/{id}','LinkController@update');
    Route::resource('link','LinkController');
        //心声管理
    Route::post('uservoice/{id}','UserVoiceController@update');
    Route::resource('uservoice','UserVoiceController');
        //用户意见管理
    Route::post('opinions/{id}','OpinionsController@update');
    Route::get('opinions/{id}/destroy','OpinionsController@destroy');
    Route::get('opinions/{id}/restore','OpinionsController@restore');
    Route::get('opinions/{id}/forceDelete','OpinionsController@forceDelete');
    Route::get('opinions/trash','OpinionsController@trash');
    Route::get('opinions/{isshow}/trash','OpinionsController@trash');
    Route::get('{isshow}/opinions','OpinionsController@index');
    Route::resource('opinions','OpinionsController');
        //图片管理
    Route::post('pic/{id}','PicController@update');
    Route::get('pic/create/{id}','PicController@create');
    Route::resource('pic','PicController');
        //类型管理
//    Route::post('type/{id}','TypeController@update');
//    Route::get('type/create/{id}','TypeController@create');
//    Route::resource('type','TypeController');
//    Route::get('type/tableid/{table_id}','TypeController@index');
        //用户日志管理
    Route::resource('userlog','UserlogController');
    Route::resource('adminlog','AdminlogController');
        //地区管理
    Route::post('area/{id}','AreaController@update');
    Route::resource('area','AreaController');
    //企业页面功能管理
        //企业主页路由
    Route::post('commain/{id}','ComMainController@update');
    Route::resource('commain','ComMainController');
        //企业模块路由
    Route::post('commodule/{id}','ComModuleController@update');
    Route::resource('commodule','ComModuleController');
        //企业功能路由
    Route::post('comfunc/{id}','ComFuncController@update');
    Route::resource('comfunc','ComFuncController');
        //企业宣传路由
    Route::post('comppt/{id}','ComPptController@update');
    Route::resource('comppt','ComPptController');
    //广告路由
        //广告管理
    Route::resource('ad','AdController');
        //广告位管理
    Route::get('place/create','AdPlaceController@create');
    Route::resource('place','AdPlaceController');
        //修改（版本）日志管理
    Route::get('versionlog/{id}/forceDelete','VersionlogController@forceDelete');
    Route::post('versionlog/{id}','VersionlogController@update');
    Route::resource('versionlog','VersionlogController');
        //创意管理
    Route::post('idea/{id}','IdeaController@update');
    Route::resource('idea','IdeaController');
        //分镜管理
    Route::post('storyboard/{id}','StoryBoardController@update');
    Route::get('storyboard/{id}/destroy','StoryBoardController@destroy');
    Route::get('storyboard/{id}/restore','StoryBoardController@restore');
    Route::get('storyboard/{id}/forceDelete','StoryBoardController@forceDelete');
    Route::get('storyboard/trash','StoryBoardController@trash');
    Route::resource('storyboard','StoryBoardController');
        //话题管理
//    Route::post('talk/{id}','TalkController@update');
    Route::get('talk/c/{uname}','TalkController@index');
    Route::resource('talk','TalkController');
        //话题专题管理
    Route::post('theme/{id}','ThemeController@update');
    Route::get('theme/u/{uname}','ThemeController@index');      //u代表用户简写
    Route::resource('theme','ThemeController');
    //订单管理
        //订单路由
    Route::get('order/{del}/{isshow}','OrderController@index');
    Route::post('order/{id}','OrderController@update');
    Route::resource('order','OrderController');
        //售后路由
    Route::get('orderfirm/{del}/{isshow}','OrderFirmController@index');
    Route::post('orderfirm/{id}','OrderFirmController@update');
    Route::resource('orderfirm','OrderFirmController');
        //在线订单路由
    Route::get('orderpro/{del}/{isshow}','OrderProductController@index');
    Route::post('orderpro/{id}','OrderProductController@update');
    Route::resource('orderpro','OrderProductController');
});