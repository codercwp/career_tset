<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Temperament extends Model
{
    protected $table = "temperament";

    public $timestamps = true;

    protected $guarded = [];

public static function statistics(){
    //$data= DB::select('SELECT * FROM hld_type');
    //$data = self::select('A','B')->where('A',1)->get();
    try {
    $row = array("A"=>0,"B"=>0,"C"=>0,"D"=>0);
    $row['A'] = self::select('most')->where('most','A')->count();
    $row['B'] = self::select('most')->where('most','B')->count();
    $row['C'] = self::select('most')->where('most','C')->count();
    $row['D'] = self::select('most')->where('most','D')->count();
    return $row;
    } catch (\Exception $e) {
        logError("查询失败！", [$e->getMessage()]);
        return false;
    }
}

public static function age($age){
    try {
    $row = array("A"=>0,"B"=>0,"C"=>0,"D"=>0);
    $row['A'] = self::join('user as use','use.id','temperament.user_id')
        ->where('temperament.most','A')
        ->where('use.age',$age)
        ->count();
    $row['B'] = self::join('user as use','use.id','temperament.user_id')
        ->where('temperament.most','B')
        ->where('use.age',$age)
        ->count();
    $row['C'] = self::join('user as use','use.id','temperament.user_id')
        ->where('temperament.most','C')
        ->where('use.age',$age)
        ->count();
    $row['D'] = self::join('user as use','use.id','temperament.user_id')
        ->where('temperament.most','D')
        ->where('use.age',$age)
        ->count();
    return $row;

    } catch (\Exception $e) {
        logError("查询失败！", [$e->getMessage()]);
        return false;
    }

}

public static function gender($gender){
    try {
        $row = array("A"=>0,"B"=>0,"C"=>0,"D"=>0);
        if($gender=='全部')
        {
            $row['A'] = self::select('most')->where('most','A')->count();
            $row['B'] = self::select('most')->where('most','B')->count();
            $row['C'] = self::select('most')->where('most','C')->count();
            $row['D'] = self::select('most')->where('most','D')->count();
        }
        else
        {
            $row['A'] = self::join('user as use','use.id','temperament.user_id')
                ->where('temperament.most','A')
                ->where('use.gender',$gender)
                ->count();
            $row['B'] = self::join('user as use','use.id','temperament.user_id')
                ->where('temperament.most','B')
                ->where('use.gender',$gender)
                ->count();
            $row['C'] = self::join('user as use','use.id','temperament.user_id')
                ->where('temperament.most','C')
                ->where('use.gender',$gender)
                ->count();
            $row['D'] = self::join('user as use','use.id','temperament.user_id')
                ->where('temperament.most','D')
                ->where('use.gender',$gender)
                ->count();
        }

        return $row;
    } catch (\Exception $e) {
        logError("查询失败！", [$e->getMessage()]);
        return false;
    }
}

    public static function total(){
        try {
            $data = self::join('user as use','use.id','temperament.user_id')
                ->select('use.id','use.name','use.tele','use.age','use.gender','temperament.most')
                ->get();
            return  $data;

        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }

    public static function details($userid){
        try {
            $data = self::join('user as use','use.id','temperament.user_id')
                ->where('use.id',$userid)
                ->select('use.name','use.id','use.tele','use.age','use.gender','use.education','use.retired_time','use.retired_way','use.work')
                ->get();
            return  $data;

        } catch (\Exception $e) {
            logError("查询失败！", [$e->getMessage()]);
            return false;
        }
    }

    public static function Search($search){
    try {
        $data = self::join('user as use','use.id','temperament.user_id')
            ->where('use.name',$search)
            ->orwhere('use.tele',$search)
            ->select('use.id','use.name','use.tele','use.age','use.gender','temperament.most')
            ->get();

        return  $data;

    } catch (\Exception $e) {
        logError("搜索失败！", [$e->getMessage()]);
        return false;
    }
}
}
