<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});

// Super Admin
Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::get('superadmin/dashboard', fn() => view('superadmin.dashboard'))->name('superadmin.dashboard');
});

// Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

// Karyawan
Route::middleware(['auth', 'role:Karyawan'])->group(function () {
    Route::get('karyawan/dashboard', fn() => view('karyawan.dashboard'))->name('karyawan.dashboard');
});
