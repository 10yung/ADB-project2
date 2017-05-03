<?php
/**
 * Created by PhpStorm.
 * User: liuchiahong
 * Date: 2017/5/3
 * Time: 下午8:29
 */

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class RentRecordRepo
{
    public static function getRentRecordbymemID($memID){
        $rentrecord = DB::table('RentRecord')
            ->where('memID', '=', $memID)
            ->get();

        return $rentrecord;
    }
}