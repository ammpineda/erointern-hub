<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client/login');
});

Route::get('/dashboard', function () {
    return view('client/dashboard');
});
