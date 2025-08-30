<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\SPKaryawanController;
use App\Http\Controllers\SuperAdmin\Pengajuan\SPPengajuanCutiController;
use App\Http\Controllers\SuperAdmin\Pengajuan\SPPengajuanSakitController;
use App\Http\Controllers\SuperAdmin\Pengajuan\SPPengajuanLemburController;
use App\Http\Controllers\SuperAdmin\SPLaporanController;
use App\Http\Controllers\SuperAdmin\SPSettingsController;

use App\Http\Controllers\Karyawan\KaryawanController;

// === AUTH ===
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// === REGISTER ===
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// === RESET PASSWORD ===
Route::get('/password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showNewPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');


// Super Admin
Route::middleware(['auth', 'role:Super Admin'])->prefix('superadmin')->name('superadmin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('dashboard');

    // Karyawan
    Route::resource('karyawan', SPKaryawanController::class);

    // Pengajuan
    Route::prefix('pengajuan')->name('pengajuan.')->group(function () {
        Route::get('cuti', [SPPengajuanCutiController::class, 'index'])->name('cuti');
        Route::get('lembur', [SPPengajuanLemburController::class, 'index'])->name('lembur');
        Route::get('sakit', [SPPengajuanSakitController::class, 'index'])->name('sakit');
    });

    // Laporan
    Route::get('laporan', [SPLaporanController::class, 'index'])->name('laporan');

    // Pengaturan
    Route::get('settings', [SPSettingsController::class, 'index'])->name('settings');
});

// Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Karyawan
Route::middleware(['auth', 'role:Karyawan'])->group(function () {
    Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])->name('karyawan.dashboard');
});
