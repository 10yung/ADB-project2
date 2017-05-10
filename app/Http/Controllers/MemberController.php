<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repository\MemberRepo;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    //
    public function deleteMemberByID() {

        $request = Request::all();

        $userID = $request['memberUserID'];

        $memberDeleted = MemberRepo::deleteMemberByUserID($userID);


        if ($memberDeleted) {
            session()->flash('success', '刪除使用者');
        } else {
            session()->flash('errors', '錯誤發生');
        }

        return redirect('/admindashboard');
    }


    public function createMember() {
        $request = Request::all();

        $username = $request['name'];
        $password = Hash::make($request['password']);

        $memberCreated = MemberRepo::createMember($username, $password);

        if ($memberCreated) {
            session()->flash('success', '已新增使用者');
        } else {
            session()->flash('errors', '錯誤發生');
        }

        return redirect('/admindashboard');
    }
}
