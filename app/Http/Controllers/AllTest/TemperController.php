<?php

namespace App\Http\Controllers\AllTest;

use App\Http\Controllers\Controller;
use App\Models\Temperament;
use App\Models\User;
use Illuminate\Http\Request;

class TemperController extends Controller
{
    public function temperamentStatistics()
    {
        $data = Temperament::statistics();
        return $data?
            json_success('查询成功!', $data, 200) :
            json_fail('查询失败!', null, 100);
    }

    public function temperamentAge(Request $request)
    {
        $data = Temperament::age($request['age']);
        return $data?
            json_success('查询成功!', $data, 200) :
            json_fail('查询失败!', null, 100);
    }

    public function temperamentGender(Request $request)
    {
        $data = Temperament::gender($request['gender']);
        return $data?
            json_success('查询成功!', $data, 200) :
            json_fail('查询失败!', null, 100);
    }

    public function temperamentTotal()
    {
        $data = Temperament::total();
        return $data?
            json_success('查询成功!', $data, 200) :
            json_fail('查询失败!', null, 100);
    }

    public function temperamentDetails(Request $request)
    {
        $data = Temperament::details($request['userid']);
        return $data?
            json_success('查询成功!', $data, 200) :
            json_fail('查询失败!', null, 100);
    }
    public function temperamentSearch(Request $request)
    {
        $data = Temperament::Search($request['search']);
        return $data?
            json_success('查询成功!', $data, 200) :
            json_fail('查询失败!', null, 100);
    }

}
