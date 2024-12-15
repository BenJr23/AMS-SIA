<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AttendanceController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('admin.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('/clocking', function () {
    return view('auth.clocking');
})->name('clocking');

Route::get('/clockingform', function () {
    return view('staff.clockingform');
})->name('clockingform');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/clocking', [AuthController::class, 'clocking'])->name('clocking');


Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');