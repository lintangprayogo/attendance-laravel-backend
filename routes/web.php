<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

   Route::resource("users",UserController::class);
});
