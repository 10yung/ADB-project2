<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;



class MemberRepo
{

    public static function getMemberByUserID($userID){
        $member = DB::table('Member')
            ->where('userID', '=',$userID)
            ->first();
        return $member;
    }

    public static function getAllMembers(){
        $members = DB::table('Member')
            ->get();
        return $members;
    }

    public static function deleteMemberByUserID($userID){
        DB::table('Member')
            ->where('userID', '=',$userID)
            ->delete();


        DB::table('Users')
            ->where('id', '=',$userID)
            ->delete();

        return true;
    }


}