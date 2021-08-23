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

Route::prefix('pdp')->namespace('AllTest')->group(function () {
    Route::post('pdptotest', 'PdpController@pdpToTest');//pdp测试
});//yjx
Route::prefix('hld')->namespace('AllTest')->group(function () {
    Route::post('hldtotest', 'HldController@hldToTest');//hld测试
    Route::get('hldtoreturn', 'HldController@hldToReturn');//hld测试返回结果
});//yjx
