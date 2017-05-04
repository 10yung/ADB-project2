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

<<<<<<< HEAD
=======
Route::get('/memdashbaord/{mem_id}', 'RentRecordController@show');
Route::get('/memdashbaord/{mem_id}/create', 'RentRecordController@create');

>>>>>>> 3ac8c2d796cd40c329a83b426222deb6b6efd0a0


Route::group(['middleware' => ['member-auth']], function () {
    Route::get('/memdashbaord', function () {
        return view('members.memberDashboard');
    });
});

Route::group(['middleware' => ['admin-auth']], function () {
    Route::get('/admindashbaord', function () {
        return view('admin.adminDashboard');
    });
});




