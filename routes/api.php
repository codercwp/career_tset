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


Route::prefix('user')->namespace('AllTest')->group(function () {
    Route::post('addinfo', 'TemperController@addInfo');//信息填写
});//hk
Route::prefix('temperament')->namespace('AllTest')->group(function () {
    Route::post('mouldresults', 'TemperController@mouldResults');//气质测评结果
});//hk
