<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repository\MemberRepo;
use Illuminate\Support\Facades\Request;

class MemberController extends Controller
{
    //
    public function deleteMemberByID() {

        $request = Request::all();

        $userID = $request['memberUserID'];

        $memberDeleted = MemberRepo::deleteMemberByUserID($userID);


        if ($memberDeleted) {
            session()->flash('success', '完成刪除');
        } else {
            session()->flash('errors', '錯誤發生');
        }

        return redirect('/admindashboard');
    }
}
