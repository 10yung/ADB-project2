<?php
/**
 * Created by PhpStorm.
 * User: liuchiahong
 * Date: 2017/5/3
 * Time: 下午8:28
 */

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class RentPeriodRepo
{
    public static function getAllPeriod(){
        $periodList = DB::table('RentPeriod')
            ->get();

        return $periodList;
    }
}