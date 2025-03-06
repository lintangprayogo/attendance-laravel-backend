<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthContrroller;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthContrroller::class, "login"]);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthContrroller::class, "logout"]);

    Route::get('/company', [CompanyController::class, "show"]);

    Route::post('/checkin', [AttendanceController::class, 'checkin']);

    Route::post('/checkout', [AttendanceController::class, 'checkout']);

    Route::get('/is-checkin', [AttendanceController::class, 'isCheckedin']);

    Route::post('/update-profile', [AuthContrroller::class, 'updateProfile']);
});
