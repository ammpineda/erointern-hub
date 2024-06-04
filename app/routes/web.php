<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('client/dashboard');
})->name('intern-dashboard');

Route::get('/dar', function () {
    return view('client/dar-form');
});


Route::post('/login', [LoginController::class, 'login'])->name('login');


