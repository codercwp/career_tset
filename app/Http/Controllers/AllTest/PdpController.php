<?php

namespace App\Http\Controllers\AllTest;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Hld;
use App\Models\Pdp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdpController extends Controller
{
    public function pdpToTest(Request $request)
    {
        $arr = [$request['tiger'], $request['peacock'], $request['koala'], $request['owl'], $request['chameleon']];
        $adc = ['tiger', 'peacock', 'koala', 'owl', 'chameleon'];
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5 - 1 - $i; $j++) {
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
          $request['most'] = $adc[4];
          $res =Pdp::yjx_find($request);//查找结果
          if($res){
              Pdp::yjx_updates($request); //有就更新
              return  $res ?
                  json_success('更新数据成功!', null, 200) :
                  json_fail('更新数据失败!', $arr, 100);
          }else{
              Pdp::yjx_creates($request);//没有就新增
              return  $res ?
                  json_fail('存入数据失败!', $arr, 100)  :
                  json_success('存入数据成功!', null, 200) ;
          }
    }
}
