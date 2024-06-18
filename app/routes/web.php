<?php
use App\Http\Controllers\DailyAccomplishmentFormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageDarController;


///////view routes/////////////////////////////////////////

Route::get('/', function () {
    return view('login');
})->name('login.form');

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

Route::get('/admin/manage-dars', function () {
    return view('management/manage-dars');
})->name('manage-dars');

///////////////////////////////////////////////////////////


//route for login
Route::post('/login', [LoginController::class, 'login'])->name('login');
//route for registering users via admin
Route::post('/register', [AdminController::class, 'register'])->name('register');
//route for displaying interns in manage interns page
Route::get('admin/manage-interns', [AdminController::class, 'manageInterns'])->name('manage-interns');
//route for creating new dars by the interns
Route::post('/submit-daily-report', [DailyAccomplishmentFormController::class, 'submit'])->name('submit.daily.report');
//route for displaying dars for the admin page
Route::get('admin/manage-dars', [ManageDarController::class, 'index'])->name('manage-dars.index');
