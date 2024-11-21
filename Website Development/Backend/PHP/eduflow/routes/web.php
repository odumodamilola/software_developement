<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Auth\StaffRegisterController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('change-password', [ChangePasswordController::class, 'index'])->name('changePassword');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('changePassword.store');


Route::middleware('auth')->group(function () {
    Route::get('/documents', [DocumentsController::class, 'index'])->name('documents');
    Route::post('/documents/upload', [DocumentsController::class, 'upload'])->name('documents.upload');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});
// web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/clearance', [ClearanceController::class, 'index'])->name('clearance.index');
    Route::post('/clearance/upload', [ClearanceController::class, 'upload'])->name('clearance.upload');
});


Route::get('/register/student', [StudentRegisterController::class, 'showRegistrationForm']);
Route::post('/register/student', [StudentRegisterController::class, 'register'])->name('register.student');
Route::get('/register/staff', [StaffRegisterController::class, 'showRegistrationForm']);
Route::post('/register/staff', [StaffRegisterController::class, 'register'])->name('register.staff');



Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student-dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::post('/upload-document', [DocumentsController::class, 'upload'])->name('document.upload');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff-dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::post('/approve-document', [DocumentsController::class, 'approve'])->name('document.approve');
});

Route::get('account-settings', [AccountSettingsController::class, 'index'])->name('account.settings');
Route::post('account-settings', [AccountSettingsController::class, 'updatePassword'])->name('account.settings.updatePassword');
Route::delete('/account/delete', [AccountSettingsController::class, 'deleteAccount'])->name('account.settings.deleteAccount');



Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard')->middleware('auth');
Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard')->middleware('auth');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
