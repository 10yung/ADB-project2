<?php

namespace App\Http\Controllers;

use App\Repository\ClassroomRepo;
use App\Repository\MemberRepo;
use App\Repository\RentPeriodRepo;
use Illuminate\Support\Facades\Request;
use App\Repository\RentRecordRepo;
use Illuminate\Support\Facades\Auth;



class RentRecordController extends Controller
{
    //
    public function show(){

        $user = Auth::user();
        $member = MemberRepo::getMemberByUserID($user->id);

        $classroomList = ClassroomRepo::getAllClassroom();
        $periodList = RentPeriodRepo::getAllPeriod();

        $totalRentRecord = RentRecordRepo::getRentRecordbymemID($member->memID);
        return view('members.memberDashboard',  compact('totalRentRecord','classroomList', 'periodList'));
    }

    public function create(){
        $user = Auth::user();
        $member = MemberRepo::getMemberByUserID($user->id);

        $request = Request::all();

        $rentDate = $request['rentDate'];
        $classroomID = $request['rentClassroomID'];
        $rentPeriodID = $request['rentPeriodID'];

        RentRecordRepo::createRentRecordbymemID($member->memID, $classroomID, $rentPeriodID, $rentDate);

        session()->flash('success', '更新完成');


        return redirect('/memdashboard');
    }
}
