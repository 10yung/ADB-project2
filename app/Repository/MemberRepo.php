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

    public static function getAdminByUserID($userID){
        $admin = DB::table('Admin')
            ->where('userID', '=',$userID)
            ->first();
        return $admin;
    }
}