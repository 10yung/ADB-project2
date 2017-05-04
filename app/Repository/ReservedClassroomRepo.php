<?php
/**
 * Created by PhpStorm.
 * User: liuchiahong
 * Date: 2017/5/4
 * Time: 下午3:20
 */

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservedClassroomRepo
{
    public static function addReservedClassroom($roomID, $periodID, $date){

        $date = Carbon::parse($date)->toDateString();
        DB::table('ReservedClassroom')
            ->insert([
                'roomID' => $roomID,
                'periodID' => $periodID,
                'date' => $date
            ]);
    }

    public static function checkReservedClassroom($roomID, $periodID, $date){

        $date = Carbon::parse($date)->toDateString();
        $classroomStatus = DB::table('ReservedClassroom')
            ->where('roomID', '=', $roomID)
            ->where('periodID', '=', $periodID)
            ->where('date', '=', $date)
            ->first();

        $status = 'AVAILABLE';

        if(!is_null($classroomStatus)){
            $status = 'RESERVED';
        }

        return $status;
    }

    public static function deleteReservedClassroom($roomID, $periodID, $date){
        $date = Carbon::parse($date)->toDateString();
        DB::table('ReservedClassroom')
            ->where('roomID', '=', $roomID)
            ->where('periodID', '=', $periodID)
            ->where('date', '=', $date)
            ->delete();
    }
}