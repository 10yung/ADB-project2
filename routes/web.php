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
    return view('welcome');
});







Route::group(['middleware' => ['member-auth']], function () {
    Route::get('/memdashboard', 'RentRecordController@show');
    Route::post('/memdashboard/create', 'RentRecordController@create');
});

Route::group(['middleware' => ['admin-auth']], function () {
    Route::get('/admindashbaord', function () {
        return view('admin.adminDashboard');
    });
});




