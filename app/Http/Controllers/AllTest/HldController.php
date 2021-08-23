<?php

namespace App\Http\Controllers\AllTest;

use App\Http\Controllers\Controller;
use App\Models\Hld;
use App\Models\HldType;

use Illuminate\Http\Request;

class HldController extends Controller
{

    /**
     * 查询霍兰德测试类型的人数
     * @return Json
     */
    public function getHldPeople(){
        $res=Hld::zqz_gethldpeople();
        return  $res ?
            json_success('查询成功!', $res, 200) :
            json_fail('查询失败!', null, 100);
    }

    /**
     * 根据年龄查询霍兰德测试不同年龄人数分布
     * @param Request $request
     * ['age']=>用户年龄
     * @return Json
     */
    public function getHldAge(Request $request){
        $res=Hld::zqz_gethldage($request['age']);
        return  $res ?
            json_success('查询成功!', $res, 200) :
            json_fail('查询失败!', null, 100);
    }

    /**
     * 根据性别查询霍兰德测试不同类型分布
     * @param Request $request
     * ['gender']=>用户性别
     * @return Json
     */
    public function getHldGender(Request $request){
        $res=Hld::zqz_gethldgender($request['gender']);
        return  $res ?
            json_success('查询成功!', $res, 200) :
            json_fail('查询失败!', null, 100);
    }

    /**
     * 查询霍兰德测试结果
     * @return Json
     */
    public function getTestInfo(){
        $res=Hld::zqz_gettestinfo();
        return  $res ?
            json_success('查询成功!', $res, 200) :
            json_fail('查询失败!', null, 100);
    }

    /**
     * 根据用户id查询霍兰德测试用户详情结果
     * @param Request $request
     * ['id']=>用户id
     * @return Json
     */
    public function detailed(Request $request){
        $res=Hld::zqz_detailed($request['id']);
        return  $res ?
            json_success('查询成功!', $res, 200) :
            json_fail('查询失败!', null, 100);
    }

    /**
     * 通过名字或手机号查询霍兰德测试的结果
     * @param Request $request
     * ['select']=>用户的名字或手机号
     * @return Json
     */
    public function hldSelect(Request $request){
        $res=Hld::zqz_hldselect($request['select']);
        return  $res ?
            json_success('查询成功!', $res, 200) :
            json_fail('查询失败!', null, 100);
    }
}

    public function hldToTest(Request $request) {
        $a = $request['R'];
        $b = $request['I'];
        $c = $request['A'];
        $d= $request['S'];
        $e= $request['E'];
        $f= $request['C'];
        $arr=array($a,$b,$c,$d,$e,$f);
        $adc = ['R', 'I', 'A', 'S', 'E','C'];
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 6 - 1 - $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                    $tmps = $adc[$j];
                    $adc[$j] = $adc[$j + 1];
                    $adc[$j + 1] = $tmps;
                }
            }
        }
        $request['most'] = $adc[5];
        $res =Hld::yjx_find($request);//查找结果
        if($res){
            Hld::yjx_updates($request); //有就更新
            return  $res ?
                json_success('更新数据成功!', null, 200) :
                json_fail('更新数据失败!', $arr, 100);
        }else{
            Hld::yjx_creates($request);//没有就新增
            return  $res ?
                json_fail('存入数据失败!', $arr, 100)  :
                json_success('存入数据成功!', null, 200) ;
        }
    }
    //返回测试结果
     public  function  hldToReturn(Request $request){//RIASEC的值
         $a = $request['R'];
         $b = $request['I'];
         $c = $request['A'];
         $d= $request['S'];
         $e= $request['E'];
         $f= $request['C'];
         $arr=array($a,$b,$c,$d,$e,$f);
         $adc = ['R', 'I', 'A', 'S', 'E','C'];
         for ($i = 0; $i < 6; $i++) {
             for ($j = 0; $j < 6 - 1 - $i; $j++) {
                 if ($arr[$j] > $arr[$j + 1]) {
                     $tmp = $arr[$j];
                     $arr[$j] = $arr[$j + 1];
                     $arr[$j + 1] = $tmp;
                     $tmps = $adc[$j];
                     $adc[$j] = $adc[$j + 1];
                     $adc[$j + 1] = $tmps;
                 }
             }
         }
         $rea= $adc[5];
         $reb=$adc[4];
         $rec=$adc[3];
         $re=$rea.$reb.$rec;
         $res= HldType::yjx_return($re);
             return  $res ?
                 json_success('返回数据成功!', $res, 200) :
                 json_fail('返回数据失败!', $arr, 100);
         }

    public  function  Returnid(Request $request){
         $din =$request;
         Hld::yjx_return($din);
        $a = $request['R'];
        $b = $request['I'];
        $c = $request['A'];
        $d= $request['S'];
        $e= $request['E'];
        $f= $request['C'];
        $arr=array($a,$b,$c,$d,$e,$f);
        $adc = ['R', 'I', 'A', 'S', 'E','C'];
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 6 - 1 - $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                    $tmps = $adc[$j];
                    $adc[$j] = $adc[$j + 1];
                    $adc[$j + 1] = $tmps;
                }
            }
        }
        $rea= $adc[5];
        $reb=$adc[4];
        $rec=$adc[3];
        $re=$rea.$reb.$rec;
        $res= HldType::yjx_return($re);
        return  $res ?
            json_success('返回数据成功!', $res, 200) :
            json_fail('返回数据失败!', $arr, 100);
    }
    public function  acc(Request $request){
        Hld::yjx_return($request);
    }
     }







