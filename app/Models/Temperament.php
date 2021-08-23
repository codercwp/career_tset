<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperament extends Model
{
    protected $table = "temperament";

    public $timestamps = true;

    protected $guarded = [];

    public static function hk_mouldresults($param)
    {
        try {
            $most = max($param['A'], $param['B'], $param['C'], $param['D']);
            $result = self::where('id',$param['id'])->count();
            if ($result) {
                return self::where('id', $param['id'])->update([
                    'user_id' => $param['id'],
                    'A' => $param['A'],
                    'B' => $param['B'],
                    'C' => $param['C'],
                    'D' => $param['D'],
                    'most' => $most
                ]);
            }else{
                return self::create([
                    'user_id' => $param['id'],
                    'A' => $param['A'],
                    'B' => $param['B'],
                    'C' => $param['C'],
                    'D' => $param['D'],
                    'most' => $most
                ]);
            }
        } catch (\Exception $e) {
            logError("数据添加失败！", [$e->getMessage()]);
            return false;
        }
    }
}
