<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdp extends Model
{
    protected $table = "pdp";

    public $timestamps = true;

    protected $guarded = [];

    public static function yjx_find($param)
    {
        try {
            return self::select('user_id')->where('user_id',$param['id'])->count();
        } catch (\Exception $e) {
            logError("查找数据失败！", [$e->getMessage()]);
            return false;
        }
    }

    public static function yjx_creates($request)
    {
        try {
           return self::create([
                'user_id'=>$request['id'],
               'tiger'=>$request['tiger'],
               'peacock'=>$request['peacock'],
               'koala'=>$request['koala'],
               'owl'=>$request['owl'],
               'chameleon'=>$request['chameleon'],
               'most'=>$request['most']
            ]);
        } catch (\Exception $e) {
            logError("存入数据失败！", [$e->getMessage()]);
            return false;
        }
    }

    public static function yjx_updates($request)
    {
        try {
            return self::where('user_id','=',$request['id'])
                  ->update([
                'tiger'=>$request['tiger'],
                'peacock'=>$request['peacock'],
                'koala'=>$request['koala'],
                'owl'=>$request['owl'],
                'chameleon'=>$request['chameleon'],
                'most'=>$request['most']
            ]);
        } catch (\Exception $e) {
            logError("更新数据失败！", [$e->getMessage()]);
            return false;
        }
    }
}
