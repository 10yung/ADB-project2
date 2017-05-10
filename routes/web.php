<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['member-auth', 'enable-querylog']], function () {
    Route::get('/memdashboard', 'RentRecordController@show');
    Route::post('/memdashboard/create', 'RentRecordController@create');
    Route::post('/memdashboard/cancel', 'RentRecordController@cancelReservation');
});

Route::group(['middleware' => ['admin-auth', 'enable-querylog']], function () {
    Route::get('/admindashboard', 'RentRecordController@adminShow');
    Route::post('/admindashboard/updaterentrecord', 'RentRecordController@updateRentRecordbyDate');
    Route::post('/admindashboard/createmember', 'MemberController@createMember');
    Route::post('/admindashboard/deletemember', 'MemberController@deleteMemberByID');
});



