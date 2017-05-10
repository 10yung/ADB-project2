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


        DB::table('users')
            ->where('id', '=',$userID)
            ->delete();

        return true;
    }

    public static function createMember($name, $password){

        $id = DB::table('users')
                ->insertGetId(['name' => $name, 'account' => $name,'password' => $password, 'userType' => 'Member']);

        DB::table('Member')
            ->insert(['name' => $name, 'position' => 'student', 'userID' => $id]);

        return true;
    }


}