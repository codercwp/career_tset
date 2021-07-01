<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $LoginRequest)
    {
        try {
            $credentials = self::credentials($LoginRequest);

            if (!$token = auth('admin')->attempt($credentials)) {
                return json_fail('账号或密码错误！', null, 100);
            }
            return self::respondWithToken($token, 'Login Success!');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return json_fail('登陆失败！', null, 500);
        }
    }

    public function register(Request $RegisterRequest) {
        $arr = self::RegisterHandle($RegisterRequest);
        $res = Admin::createUser($arr);
        return  $res ?
            json_success('注册成功!', null, 200) :
            json_fail('注册失败!', $arr, 100);
    }

    protected static function respondWithToken($token, $msg)
    {
        return json_success($msg, array(
            'token' => $token,
            'token_type' => 'admin'
        ), 200);
    }

    protected static function credentials($request)
    {
        return [
            'account' => $request['account'],
            'password' => $request['password']
        ];
    }


    protected static function RegisterHandle($request)
    {
        $registeredInfo['password'] = bcrypt($request['password']);
        $registeredInfo['account'] = $request['account'];
        return $registeredInfo;
    }

    public function logout()
    {
        try {
            auth('user')->logout();
        } catch (\Exception $e) {

        }
        return auth('user')->check() ?
            json_fail('注销登陆失败!',null, 100 ) :
            json_success('注销登陆成功!',null,  200);
    }
}
