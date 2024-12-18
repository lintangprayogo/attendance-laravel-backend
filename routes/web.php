<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',function(){
    return view('pages.dashboard',['type_menu' => 'dashboard']);
});

