<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends \Illuminate\Foundation\Auth\User implements JWTSubject,Authenticatable
{
    use Notifiable;

    public $table = 'user';

    protected $rememberTokenName = NULL;

    protected $guarded = [];

    protected $fillable  = ['name',"tele","qq","wechat","password"];

    protected $hidden = [
        'password',
    ];

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return self::getKey();
    }

    public static function createUser($array = [])
    {
        try {
            return self::create($array) ?
                true :
                false;

        } catch (\Exception $e) {
            logError("用户创建失败！", [$e->getMessage()]);
            return false;
        }
    }


    public static function hk_addinfo($param)
    {
        try {
                return self::where('id', $param['id'])->update([
                    'age' => $param['age'],
                    'gender' => $param['gender'],
                    'education' => $param['education'],
                    'retired_time' => $param['retired_time'],
                    'retired_way' => $param['retired_way'],
                    'work' => $param['work']
                ]);
        } catch (\Exception $e) {
            logError("用户填写失败！", [$e->getMessage()]);
            return false;
        }
    }
}
