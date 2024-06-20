<?php
use App\Http\Controllers\DailyAccomplishmentFormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;


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



//route for login
Route::post('/login', [LoginController::class, 'login'])->name('login');
//route for registering interns via admin
Route::post('/register', [AdminController::class, 'register'])->name('register');
//route for displaying interns in manage interns page
Route::get('admin/manage-interns', [AdminController::class, 'manageInterns'])->name('display-interns');
//route for creating new dars by the interns
Route::post('/submit-daily-report', [DailyAccomplishmentFormController::class, 'submit'])->name('create-dar');
//route for displaying dars for the admin page
Route::get('admin/manage-dars', [DailyAccomplishmentFormController::class, 'index'])->name('display-dars');
//route for displaying announcements
Route::get('admin/manage-announcements', [AnnouncementController::class, 'displayAnnouncements'])->name('display-announcements');
//route for adding announcements
Route::post('/admin/add-announce', [AnnouncementController::class, 'addAnnouncement'])->name('add-announcement');
