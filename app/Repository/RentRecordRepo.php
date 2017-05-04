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
        $rentrecord = DB::table('RentRecord')
            ->join('Classroom', 'RentRecord.roomID', '=', 'Classroom.roomID')
            ->join('RentPeriod', 'RentRecord.periodID', '=', 'RentPeriod.periodID')
            ->select('Date', 'Classroom.name', 'RentPeriod.startTime', 'RentPeriod.endTime')
            ->where('memID', '=', $memID)
            ->get();

        return $rentrecord;
    }

    public static function createRentRecordbymemID($memID, $roomID) {
        DB::table('RentRecord')
            ->insert(
                ['periodID'=> 1,'roomID' => $roomID, 'Date' => Carbon::now()->format('Y-m-d H:i:s'), 'memID' => $memID]
            );
    }

}