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
           ->select(
               'Date', 'name', 'startTime',
               'endTime', 'roomID', 'periodID',
               'status'
           )
            ->where('memID', '=', $memID)
            ->get()
            ->reverse();

        return $rentrecord;
    }

    public static function createRentRecordbymemID($memID, $roomID, $periodID, $date) {
        $date = Carbon::parse($date)->toDateString();
        $recordID = DB::table('RentRecord')
            ->insertGetId(
                ['roomID' => $roomID, 'Date' => $date, 'periodID' => $periodID,'memID' => $memID, 'status' => '預約中']
            );

        DB::table('RentRecord_history')
            ->insert(
                ['recordID' => $recordID,'roomID' => $roomID, 'Date' => $date, 'periodID' => $periodID,'memID' => $memID, 'action' => '預約中','record_datetime' => Carbon::now()->toDateTimeString(),'expired' => '未過期']
            );
    }

    public static function cancelReservation($memID, $roomID, $periodID, $date){
        $date = Carbon::parse($date)->toDateString();
        DB::table('RentRecord')
            ->where('memID', '=', $memID)
            ->where('roomID', '=', $roomID)
            ->where('periodID', '=', $periodID)
            ->where('date', '=', $date)
            ->update(
                ['status' => '已取消']
            );

        $recordID = DB::table('RentRecord')
            ->where('memID', '=', $memID)
            ->where('roomID', '=', $roomID)
            ->where('periodID', '=', $periodID)
            ->where('date', '=', $date)
            ->value('recordID');

        DB::table('RentRecord_history')
            ->insert(
                ['recordID' => $recordID,'roomID' => $roomID, 'Date' => $date, 'periodID' => $periodID,'memID' => $memID, 'action' => '已取消','record_datetime' => Carbon::now()->toDateTimeString(),'expired' => '未過期']
            );
    }

    public static function updateRentRecordbyDate() {

        $datetime = Carbon\Carbon::now();

        DB::table('RentRecord')
            ->where('Date', '<', $datetime)
            ->delete();

        DB::table('RentRecord_history')
            ->where('Date', '<', $datetime)
            ->update(['expired' => '已過期']);

        return true;
    }

    public static function getAllRentRecord() {
        $allrentrecord = DB::table('v_admintotalrentrecord')
            ->select('memberName', 'Date', 'classroomName','startTime', 'endTime', 'status')
            ->get()
            ->reverse();

        return $allrentrecord;
    }

    public static function getPaginateAllRentRecord() {
        $allrentrecord = DB::table('v_admintotalrentrecord')
            ->select('memberName', 'Date', 'classroomName','startTime', 'endTime', 'status')
            ->orderBy('Date')
            ->paginate(5);

        return $allrentrecord;
    }

    public static function getPaginateRentRecordbymemID($memID){
        $allrentrecord = DB::table('v_totalrentrecord')
            ->select('Date', 'name', 'startTime', 'endTime', 'roomID', 'periodID', 'status')
            ->where('memID', '=', $memID)
            ->orderBy('Date')
            ->paginate(5);

        return $allrentrecord;
    }

    public static function checkReservedClassroom($roomID, $periodID, $date){

        $date = Carbon::parse($date)->toDateString();
        $reservedClassrooms = DB::table('RentRecord')
            ->where('roomID', '=', $roomID)
            ->where('periodID', '=', $periodID)
            ->where('date', '=', $date)
            ->where('status', '=', '預約中')
            ->first();

        $status = 'AVAILABLE';

        if(!is_null($reservedClassrooms)){
            $status = 'RESERVED';
        }

        return $status;
    }

}