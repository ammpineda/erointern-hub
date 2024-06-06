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

Route::get('/admin/dashboard', function () {
    return view('management/dashboard');
})->name('admin-dashboard');

Route::get('/admin/manage-interns', function () {
    return view('management/manage-interns');
})->name('manage-interns');

Route::post('/login', [LoginController::class, 'login'])->name('login');


