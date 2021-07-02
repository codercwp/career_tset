<?php

namespace App\Http\Controllers\AllTest;

use App\Http\Controllers\Controller;
use App\Models\Hld;
use App\Models\HldType;
use App\Models\Pdp;
use Illuminate\Http\Request;

class HldController extends Controller
{
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
     }






