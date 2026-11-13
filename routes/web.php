<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Khu vực Học viên
Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::get('/dashboard', fn() => response()->json(['message' => 'Khu vực Học viên']));
});

// Khu vực Giảng viên (/teacher/* chỉ giảng viên)
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', fn() => response()->json(['message' => 'Khu vực Giảng viên']));
});

// Khu vực Quản trị (/admin/* chỉ quản trị)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => response()->json(['message' => 'Khu vực Quản trị']));
});