<?php

namespace App\Http\Controllers\AllTest;

use App\Http\Controllers\Controller;
use App\Models\Temperament;
use App\Models\User;
use Illuminate\Http\Request;

class TemperController extends Controller
{
    public function addInfo(Request $request)
    {
       $data =  User::hk_addinfo($request);
       return  $data ?
            json_success('填写成功!', null, 200) :
            json_fail('填写失败!', null, 100);
    }

    public function mouldresults(Request $request)
    {
        $data = Temperament::hk_mouldresults($request);
        return  $data ?
            json_success('数据添加成功!', null, 200) :
            json_fail('数据添加失败!', null, 100);
    }
}
