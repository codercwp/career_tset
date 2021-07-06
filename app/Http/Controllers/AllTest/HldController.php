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
