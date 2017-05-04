<?php
/**
 * Created by PhpStorm.
 * User: liuchiahong
 * Date: 2017/5/3
 * Time: 下午8:29
 */

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Carbon;

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
        $date = Carbon::parse($date)->toDateString();
        DB::table('RentRecord')
            ->insert(
                ['roomID' => $roomID, 'Date' => $date, 'periodID' => $periodID,'memID' => $memID]
            );
    }

    public static function updateRentRecordbyDate() {

        $mytime = Carbon\Carbon::now();

        DB::table('RentRecord')
            ->where('Date', '<', $mytime)
            ->update(['status' => '已過期']);

        return true;
    }

    public static function getAllRentRecord() {
        $allrentrecord = DB::table('v_admintotalrentrecord')
            ->select('memberName', 'Date', 'classroomName','startTime', 'endTime', 'status')
            ->get()
            ->reverse();

        return $allrentrecord;
    }
}