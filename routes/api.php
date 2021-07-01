<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::prefix('admin')->namespace('AllTest')->group(function () {
    Route::get('temperamentstatistics', 'TemperController@temperamentStatistics');//气质测试总人数统计
    Route::get('temperamentage', 'TemperController@temperamentAge');//气质测试岁数人数统计
    Route::get('temperamentgender', 'TemperController@temperamentGender');//气质测试性别人数统计
    Route::get('temperamenttotal', 'TemperController@temperamentTotal');//气质测试成员信息
    Route::get('temperamentdetails', 'TemperController@temperamentDetails');//详细成员详细
    Route::get('temperamentsearch', 'TemperController@temperamentSearch');//气质测评搜索

});//pxy
