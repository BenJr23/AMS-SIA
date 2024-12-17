<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DependentEntityController;
use App\Http\Controllers\GuestController;

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

Route::get('/guestclocking', function () {
    return view('auth.guestclocking');
})->name('guestclocking');

Route::get('/guestclockingform', function () {
    return view('guest.guestclockingform');
})->name('guestclockingform');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/clocking', [AuthController::class, 'clocking'])->name('clocking');


Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');

Route::post('/clockval', [GuestController::class, 'clockval'])->name('clockval');
Route::post('/attendance', [AttendanceController::class, 'store2'])->name('attendance.store2');
