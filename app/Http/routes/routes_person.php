<?php
/**
 * 这里是会员路由
 */

//Route::get('member',function(){
//    return 'member';
//});

Route::group(['prefix'=>'person','namespace'=>'Person'], function(){
    Route::get('/','HomeController@index');
    Route::get('/home','HomeController@index');
});