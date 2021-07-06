<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('user')->namespace('Login')->group(function () {
    Route::post('login', 'LoginController@login');//用户登录
    Route::post('register', 'LoginController@register');//用户注册
    Route::post('logout', 'LoginController@logout');//注销
});//cwp

Route::prefix('admin')->namespace('Login')->group(function () {
    Route::post('login', 'AdminController@login');//管理员登录
    Route::post('register', 'AdminController@register');//管理员注册
    Route::post('logout', 'AdminController@logout');//注销
});//cwp

Route::prefix('hld')->namespace('AllTest')->group(function () {
    Route::get('hldpeople', 'HldController@getHldPeople');//查询霍兰德测试中的不同类型人数分布
    Route::get('hldage', 'HldController@getHldAge');//查询霍兰德测试中的不同类型中不同年龄分布
    Route::get('hldgender', 'HldController@getHldGender');//查询霍兰德测试中不同类型不同类型分布
    Route::get('testinfo','HldController@getTestInfo');//查询霍兰德测试结果
    Route::get('detailed','HldController@detailed');//查询用户详细资料
    Route::get('hldselect','HldController@hldSelect');//通过用户姓名或手机号查询霍兰德测试结果
});//zqz
