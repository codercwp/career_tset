<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HldType extends Model
{
    protected $table = "hld_type";

    public $timestamps = true;

    protected $guarded = [];
    //返回测试3的结果
    public static function yjx_return($request)
    {
        try {
            return self::where('type_name','=',$request)
                ->select(['type_desc'])->get();

        } catch (\Exception $e) {
            logError("更新数据失败！", [$e->getMessage()]);
            return false;
        }
    }



}
