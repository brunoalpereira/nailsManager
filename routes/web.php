<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PersonalInfosController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserRolesController;

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

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['can:manage users']], function () {
    Route::get('/personal-infos/create',[PersonalInfosController::class, 'create']);
    Route::post('/personal-infos', [PersonalInfosController::class, 'store']);
    Route::get('/personal-infos/edit/{id}', [PersonalInfosController::class, 'edit']);
    Route::put('/personal-infos/update/{id}', [PersonalInfosController::class, 'update']);
    Route::get('/personal-infos', [PersonalInfosController::class,'index']);
    Route::delete('/personal-infos/delete/{id}',[PersonalInfosController::class,'delete']);


    Route::get('/dashboard', [DashboardController::class,'index']);

});

    Route::get('/schedules/create',[ScheduleController::class, 'create']);
    Route::post('/schedules', [ScheduleController::class, 'store']);
    Route::get('/schedules/edit/{id}', [ScheduleController::class, 'edit']);
    Route::put('/schedules/update/{id}', [ScheduleController::class, 'update']);
    Route::get('/schedules', [ScheduleController::class,'index']);
    Route::delete('/schedules/cancel/{id}',[ScheduleController::class,'delete']);

    Route::group(['middleware' => ['can:manage attendance']], function () {
    Route::get('/attendance/create',[AttendanceController::class, 'create']);
    Route::post('/attendance', [AttendanceController::class, 'store']);
    Route::get('/attendance/edit/{id}', [AttendanceController::class, 'edit']);
    Route::put('/attendance/finish/{id}', [AttendanceController::class, 'update']);
    Route::get('/attendance', [AttendanceController::class,'index']);
    });
    
    Route::group(['middleware' => ['can:manage services']], function () {
        Route::get('/services/create',[ServicesController::class, 'create']);
        Route::post('/services', [ServicesController::class, 'store']);
        Route::get('/services/edit/{id}', [ServicesController::class, 'edit']);
        Route::put('/services/update/{id}', [ServicesController::class, 'update']);
        Route::get('/services', [ServicesController::class,'index']);
        Route::delete('/services/delete/{id}',[ServicesController::class,'delete']);
    });
   
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/roles',[RoleController::class,'index']);
        Route::get('/roles/create',[RoleController::class,'create']);
        Route::post('/roles',[RoleController::class,'store']);
        Route::get('/roles/edit/{id}',[RoleController::class,'edit']);
        Route::put('/roles/update/{id}',[RoleController::class,'update']);
        Route::delete('/roles/delete/{id}',[RoleController::class,'delete']);
    
        Route::get('/permissions',[PermissionsController::class,'index']);
        Route::get('/permissions/create',[PermissionsController::class,'create']);
        Route::post('/permissions',[PermissionsController::class,'store']);
        Route::get('/permissions/edit/{id}',[PermissionsController::class,'edit']);
        Route::put('/permissions/update/{id}',[PermissionsController::class,'update']);
        Route::delete('/permissions/delete/{id}',[PermissionsController::class,'delete']);
    
        Route::get('/users-roles',[UserRolesController::class,'index']);
        Route::get('/users-roles/edit/{id}',[UserRolesController::class,'edit']);
        Route::put('/users-roles/update/{id}',[UserRolesController::class,'update']);

        Route::get('/reports',[ReportController::class,'index']);

        Route::get('/reports/services-total',[ReportController::class,'totalServices']);
        Route::get('/reports/services-total-operators',[ReportController::class,'totalServicesByOperators']);
        Route::get('/reports/services-total-month',[ReportController::class,'totalServicesMonth']);
        Route::get('/reports/services-total-operators-current-month',[ReportController::class,'totalServicesByOperatorsMonth']);
        Route::get('/reports/services-total-value',[ReportController::class,'totalValueServices']);
        Route::get('/reports/services-total-month-value',[ReportController::class,'totalValueMonthServices']);
    });
   



    Route::get('/pdf',[ReportController::class,'geraPdf']);

});

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/register',[RegisteredUserController::class,'create'] );




require __DIR__.'/auth.php';
