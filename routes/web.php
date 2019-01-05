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


Route::get('/', function () {
    if (Auth::guard()->check()) {
        return redirect('AdminPanel/Dashboard');
    }else{
        return redirect('login');
    }
});



Auth::routes();



Route::prefix('AdminPanel')->group(function () {
    Route::get('Dashboard', 'HomeController@index')->name('dashboard');
    Route::post('Dashboard', 'HomeController@index')->name('dashboard');
});

Route::prefix('AdminPanel/User')->group(function () {
    Route::get('USR_ChangeProfile', 'HomeController@changeProfile')->name('changeProfile');
    Route::post('USR_ChangeProfile', 'HomeController@updateProfile')->name('updateProfile');
});


Route::prefix('AdminPanel/Courier')->group(function () {
    Route::get('CUR_CourierList', 'CouriersController@index')->name('courierIndex');
    Route::get('CUR_CourierAddEdit', 'CouriersController@create')->name('courierCreate');
    Route::post('CUR_CourierAddEdit', 'CouriersController@store')->name('courierSave');
    Route::get('CUR_CourierAddEdit/CourierID={id}', 'CouriersController@edit')->name('courierEdit');
    Route::post('CUR_CourierAddEdit/CourierID={id}', 'CouriersController@update')->name('courierUpdate');
    Route::post('CUR_CourierDelete/CourierID={id}', 'CouriersController@delete')->name('courierDelete');
});

Route::prefix('AdminPanel/Department')->group(function () {
    Route::get('DPT_DepartmentList', 'DepartmentsController@index')->name('departmentIndex');
    Route::get('DPT_DepartmentAddEdit', 'DepartmentsController@create')->name('departmentCreate');
    Route::post('DPT_DepartmentAddEdit', 'DepartmentsController@store')->name('departmentSave');
    Route::get('DPT_DepartmentAddEdit/DepartmentID={id}', 'DepartmentsController@edit')->name('departmentEdit');
    Route::post('DPT_DepartmentAddEdit/DepartmentID={id}', 'DepartmentsController@update')->name('departmentUpdate');
    Route::post('DPT_DepartmentDelete/DepartmentID={id}', 'DepartmentsController@delete')->name('departmentDelete');
});

Route::prefix('AdminPanel/InOutwardMode')->group(function () {
    Route::get('MOD_InOutwardModeList', 'ModesController@index')->name('modeIndex');
    Route::get('MOD_InOutwardModeAddEdit', 'ModesController@create')->name('modeCreate');
    Route::post('MOD_InOutwardModeAddEdit', 'ModesController@store')->name('modeSave');
    Route::get('MOD_InOutwardModeAddEdit/ModeID={id}', 'ModesController@edit')->name('modeEdit');
    Route::post('MOD_InOutwardModeAddEdit/ModeID={id}', 'ModesController@update')->name('modeUpdate');
    Route::post('MOD_InOutwardModeDelete/ModeID={id}', 'ModesController@delete')->name('modeDelete');
});

Route::prefix('AdminPanel/Inward')->group(function () {
    Route::get('IN_InwardList', 'InwardsController@index')->name('inwardIndex');
    Route::post('IN_InwardList', 'InwardsController@index')->name('inwardIndex');
    Route::get('IN_InwardAddEdit', 'InwardsController@create')->name('inwardCreate');
    Route::post('IN_InwardAddEdit', 'InwardsController@store')->name('inwardSave');
    Route::get('IN_InwardAddEdit/InwardID={id}', 'InwardsController@edit')->name('inwardEdit');
    Route::post('IN_InwardAddEdit/InwardID/{id}', 'InwardsController@upgrade')->name('inwardUpgrade');
    Route::post('IN_InwardAddEdit/InwardID={id}', 'InwardsController@delete')->name('inwardDelete');
});

Route::prefix('AdminPanel/Outward')->group(function () {
    Route::get('OUT_OutwardList', 'OutwardsController@index')->name('outwardIndex');
    Route::post('OUT_OutwardList', 'OutwardsController@index')->name('outwardIndex');
    Route::get('OUT_OutwardAddEdit', 'OutwardsController@create')->name('outwardCreate');
    Route::post('OUT_OutwardAddEdit', 'OutwardsController@store')->name('outwardSave');
    Route::get('OUT_OutwardAddEdit/OutwardID={id}', 'OutwardsController@edit')->name('outwardEdit');
    Route::post('OUT_OutwardAddEdit/OutwardID/{id}', 'OutwardsController@upgrade')->name('outwardUpgrade');
    Route::post('OUT_OutwardAddEdit/OutwardID={id}', 'OutwardsController@delete')->name('outwardDelete');
});