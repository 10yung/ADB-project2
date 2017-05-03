<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;


class ClassroomRepo
{
    public static function addClassroom($name,$size){
        DB::table('Classroom')
            ->insert(
                ['name' => $name, 'room_size' => $size]
            );

    }

    public static function deleteClassroom($classroomID){
        DB::table('Classroom')
            ->where('roomID', '=', $classroomID)
            ->delete();

    }

    public static function getClassroomByID($classroomID){
        $classrom = DB::table('Classroom')
            ->where('roomID', '=', $classroomID)
            ->get();

        return $classrom;
    }

    public static function updateClassroomByID($classroomID, $name, $size){
        $classrom = DB::table('Classroom')
            ->where('roomID', '=', $classroomID)
            ->update(['name' => $name, 'room_size' => $size]);

    }
}