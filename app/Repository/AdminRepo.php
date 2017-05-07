<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminRepo
{
    public static function getAdminByUserID($userID){
        $admin = DB::table('Admin')
            ->where('userID', '=',$userID)
            ->first();
        return $admin;
    }

}