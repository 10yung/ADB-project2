<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class AdminRepo
{

    public static function addAdmin($name){
        DB::table('Admin')
            ->insert(
                ['name' => $name]
            );
    }



}