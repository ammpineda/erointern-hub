<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('client/dashboard');
});

Route::get('/dar', function () {
    return view('client/dar-form');
});
