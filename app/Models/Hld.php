<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hld extends Model
{
    protected $table = "hld";

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
                'R'=>$request['R'],
                'I'=>$request['I'],
                'A'=>$request['A'],
                'S'=>$request['S'],
                'E'=>$request['E'],
                'C'=>$request['C'],
                'most'=>$request['most']
            ]);
        } catch (\Exception $e) {
            logError("读取数据失败！", [$e->getMessage()]);
            return false;
        }
    }

    public static function yjx_updates($request)
    {
        try {
            return self::where('user_id','=',$request['id'])
                ->update([
                    'R'=>$request['R'],
                    'I'=>$request['I'],
                    'A'=>$request['A'],
                    'S'=>$request['S'],
                    'E'=>$request['E'],
                    'C'=>$request['C'],
                    'most'=>$request['most']
                ]);
        } catch (\Exception $e) {
            logError("更新数据失败！", [$e->getMessage()]);
            return false;
        }
    }
    public static  function  yjx_return($request){
        $id=$request['id'];
        $a=self::select('user_id')->where('user_id',$id)->get();
        dd($a);
    }

}
