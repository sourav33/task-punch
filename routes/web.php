<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyReportWebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffWebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





Route::group(['middleware'=>'guest'],function(){

    Route::get('/',[AuthController::class,'index']);
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');


    // Route::get('register',[AuthController::class,'reigister_view'])->name('register');
    // Route::post('register',[AuthController::class,'reigister'])->name('register');
});

Route::group(['middleware' => ['auth'],['TrackUserSession']], function () {

    Route::controller(DashboardController::class)->group(function(){
        // Route::get('/','index');
        Route::get('/dashboard','index')->name('dashboard');
        Route::get('/home','index')->name('home');

    });

    Route::controller(StaffWebController::class)->group(function(){
        Route::get('/staff-list','staffTable')->name('staff.table');
        Route::get('/staff-data-table','staffDataTable')->name('staff.data_table');

        Route::get('/attendance-list','attendanceTable')->name('attendance.table');
        Route::get('/attendance-data-table','attendanceDataTable')->name('attendance.data_table');

        Route::post('/staff-add','staffStore')->name('staff.add');
        Route::post('/staff-edit','staffUpdate')->name('staff.edit');

    });


    Route::controller(DailyReportWebController::class)->group(function(){
        Route::get('/daily-report','index')->name('daily.report_index');
        // Route::get('/daily-report','DailyReport')->name('daily.report');


    });


    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
