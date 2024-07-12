<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DailyAccomplishmentFormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDARController;
use Illuminate\Support\Facades\Route;



///////view routes/////////////////////////////////////////

Route::get('/', function () {
    return view('login');
})->name('login.form');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('intern-dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'ManagementDash'])->name('admin-dashboard');

Route::get('/dar', function () {
    return view('client/dar-form');
});

Route::get('/announcement', function () {
    return view('client/announcement');
});



Route::get('/announcements', [AnnouncementController::class, 'interndisplayAnnouncements'])->name('display-announcements');

Route::get('intern/{id}/dars', [UserDARController::class, 'userDars'])->name('ShowUserDars');

Route::get('intern/{id}/profile',[ProfileController::class, 'edit'])->name('client-profile');
Route::post('/user/{id}/update', [ProfileController::class, 'update'])->name('user.update');


//route for login
Route::post('/login', [LoginController::class, 'login'])->name('login');
//route for registering interns via admin
Route::post('/register/intern', [AdminController::class, 'registerIntern'])->name('registerIntern');
//route for registering admins via admin
Route::post('/register/admin', [AdminController::class, 'registerAdmin'])->name('registerAdmin');
//route for displaying interns in manage interns page
Route::get('admin/manage-interns', [AdminController::class, 'manageInterns'])->name('display-interns');
//route for displaying admins in manage admins page
Route::get('admin/manage-admins', [AdminController::class, 'manageAdmins'])->name('display-admins');
//route for creating new dars by the interns
Route::post('/submit-daily-report', [DailyAccomplishmentFormController::class, 'submit'])->name('create-dar');
//route for displaying dars for the admin page
Route::get('admin/manage-dars', [DailyAccomplishmentFormController::class, 'index'])->name('display-dars');
//route for displaying announcements
Route::get('admin/manage-announcements', [AnnouncementController::class, 'displayAnnouncements'])->name('display-announcements');
//route for adding announcements
Route::post('/admin/add-announce', [AnnouncementController::class, 'addAnnouncement'])->name('add-announcement');

Route::delete('/admin/delete-announce/{announcement}', [AnnouncementController::class, 'deleteAnnouncement'])->name('delete-announcement');
