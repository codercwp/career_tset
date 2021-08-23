<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hld extends Model
{
    protected $table = "hld";

    public $timestamps = true;

    protected $guarded = [];

    /**
     * 查询霍兰德测试类型的人数
     * @author zqz
     * @return hash
     */
    public static function zqz_gethldpeople(){
        try {
            $a['R'] = self::where('most', 'R')->select('most')->count();
            $a['I'] = self::where('most', 'I')->select('most')->count();
            $a['A'] = self::where('most', 'A')->select('most')->count();
            $a['S'] = self::where('most', 'S')->select('most')->count();
            $a['E'] = self::where('most', 'E')->select('most')->count();
            $a['C'] = self::where('most', 'C')->select('most')->count();
            return $a;
        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }


    /**
     * 根据年龄查询霍兰德测试不同年龄人数分布
     * @author zqz
     * @param [int]$param
     * @return hash
     */
    public static function zqz_gethldage($param){
        try {
            $a['R'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.age', $param)->where('hld.most', 'R')->count();
            $a['I'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.age', $param)->where('hld.most', 'I')->count();
            $a['A'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.age', $param)->where('hld.most', 'A')->count();
            $a['S'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.age', $param)->where('hld.most', 'S')->count();
            $a['E'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.age', $param)->where('hld.most', 'E')->count();
            $a['C'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.age', $param)->where('hld.most', 'C')->count();
            $result = $a;
            return $result;
        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * 根据性别查询霍兰德测试不同类型分布
     * @author zqz
     * @param [String]$param
     * @return hash
     */
    public static function zqz_gethldgender($param){
        try {
            $a['R'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.gender', $param)->where('hld.most', 'R')->count();
            $a['I'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.gender', $param)->where('hld.most', 'I')->count();
            $a['A'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.gender', $param)->where('hld.most', 'A')->count();
            $a['S'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.gender', $param)->where('hld.most', 'S')->count();
            $a['E'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.gender', $param)->where('hld.most', 'E')->count();
            $a['C'] = self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.gender', $param)->where('hld.most', 'C')->count();
            return $a;

        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }

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


    /**
     * 查询霍兰德测试结果
     * @author zqz
     * @return hash
     */
    public static function zqz_gettestinfo(){
        return self::join('user as use','use.id','hld.user_id')->
        select('use.id','name','tele','age','gender','hld.most')->get();
    }

    /**
     * 根据用户id查询霍兰德测试用户详情结果
     * @author zqz
     * @param [int]$param
     * @return hash
     */
    public static function zqz_detailed($param){
        try {
            return self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.id', $param)->
            select('use.name', 'use.id', 'use.tele', 'use.age', 'use.gender', 'use.education', 'use.retired_time', 'use.retired_way', 'use.work')
                ->get();
        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * 通过名字或手机号查询霍兰德测试的结果
     * @author zqz
     * @param $param
     * @return hash
     */
    public static function zqz_hldselect($param){
        try {
            return self::join('user as use', 'use.id', 'hld.user_id')->
            where('use.name', $param)->orwhere('use.tele', $param)->
            select('use.id', 'use.name', 'use.tele', 'use.age', 'use.gender', 'hld.most')->get();
        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }
}
