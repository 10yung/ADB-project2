<?php
/**
 * Created by PhpStorm.
 * User: liuchiahong
 * Date: 2017/5/3
 * Time: 下午8:29
 */

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentRecordRepo
{
    public static function getRentRecordbymemID($memID){
        $rentrecord = DB::table('v_totalrentrecord')
           ->select('Date', 'name', 'startTime', 'endTime')
            ->where('memID', '=', $memID)
            ->get()
            ->reverse();

        return $rentrecord;
    }

    public static function createRentRecordbymemID($memID, $roomID, $periodID, $date) {
        $rentDate = Carbon::parse($date)->toDateString();
        DB::table('RentRecord')
            ->insert(
                ['roomID' => $roomID, 'Date' => $rentDate, 'periodID' => $periodID,'memID' => $memID]
            );
    }

}