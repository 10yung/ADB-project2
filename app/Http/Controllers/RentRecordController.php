<?php

namespace App\Http\Controllers;

use App\Repository\ClassroomRepo;
use App\Repository\ClassroomStatusRepo;
use App\Repository\MemberRepo;
use App\Repository\RentPeriodRepo;
use App\Repository\ReservedClassroomRepo;
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

    public function adminShow(){

        $user = Auth::user();
        $admin = MemberRepo::getAdminByUserID($user->id);
        $totalRentRecord = RentRecordRepo::getAllRentRecord();

        return view('admin.adminDashboard',  compact('totalRentRecord', 'admin'));
    }

    public function create(){
        $user = Auth::user();
        $member = MemberRepo::getMemberByUserID($user->id);

        $request = Request::all();

        $rentDate = $request['rentDate'];
        $classroomID = $request['rentClassroomID'];
        $rentPeriodID = $request['rentPeriodID'];

        $classrommReservedStatus = ReservedClassroomRepo::checkReservedClassroom($classroomID, $rentPeriodID, $rentDate);
        if($classrommReservedStatus == 'AVAILABLE'){
            RentRecordRepo::createRentRecordbymemID($member->memID, $classroomID, $rentPeriodID, $rentDate);
            ReservedClassroomRepo::addReservedClassroom($classroomID, $rentPeriodID, $rentDate);
            session()->flash('success', '預約完成');
        }else {
            session()->flash('errors', '此時段已被預約');
        }
        return redirect('/memdashboard');
    }

    public function updateRentRecordbyDate() {

        $updated = RentRecordRepo::updateRentRecordbyDate();

        if ($updated) {
            session()->flash('success', '更新完成');
        }else {
            session()->flash('errors', '錯誤發生');
        }

        return redirect('/admindashboard');
    }


}
