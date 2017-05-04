<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\RentRecordRepo;


class RentRecordController extends Controller
{
    //
    public function show($mem_id) {

        $totalRentRecord = RentRecordRepo::getRentRecordbymemID($mem_id);

        return view('members.memberDashboard',  compact('totalRentRecord'));
    }

    public function create($mem_id){
        $rendRecord = RentRecordRepo::createRentRecordbymemID($mem_id, 2);
        session()->flash('success', '更新完成');
        return redirect()->back();
    }
}
