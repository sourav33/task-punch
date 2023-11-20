<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




// // Route::get('/login', [AdminController::class, 'defaultLogin'])->name('login');
// Route::get('/', [AdminController::class, 'loginIndex']);
// Route::get('/admin/login', [AdminController::class, 'loginIndex'])->name('login');
// Route::get('/home', [AdminController::class, 'adminHome'])->middleware(['auth:sanctum','ability:admin'])->name('home');



// Route::post('/admin/login', [AdminController::class, 'login']);
// Route::get('/admin/details', [AdminController::class, 'adminDetails'])->middleware(['auth:sanctum','ability:admin']);
// Route::post('/admin/logout', [AdminController::class, 'logout'])->middleware(['auth:sanctum','ability:admin']);
// // Route::get('/details', [AdminController::class, 'details'])->middleware(['auth:sanctum','ability:admin,staff']);
// Route::post('/staff/attendance', [LocationController::class, 'staffAttendance'])->middleware(['auth:sanctum','ability:admin']);



Route::post('/staff/login', [StaffController::class, 'login']);
Route::post('/staff/logout', [StaffController::class, 'logout'])->middleware(['auth:sanctum','ability:staff']);

Route::get('/staff/details', [StaffController::class, 'staffDetails'])->middleware(['auth:sanctum','ability:staff']);
// Route::get('/staff/list', [StaffController::class, 'staffList'])->middleware(['auth:sanctum','ability:admin']);
Route::post('/staff/changePassword', [StaffController::class, 'changePassword'])->middleware(['auth:sanctum','ability:staff']);

Route::post('/staff/punch-in', [LocationController::class, 'punchIn'])->middleware(['auth:sanctum','ability:staff']);
Route::post('/staff/punch-out', [LocationController::class, 'punchOut'])->middleware(['auth:sanctum','ability:staff']);


