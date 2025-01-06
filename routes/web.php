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

Route::get('/reports', function () {
    return view('admin.reports');
})->name('reports');

Route::get('/profile', function () {
    return view('admin.profile');
})->name('profile');

Route::get('/settings', function () {
    return view('admin.settings');
})->name('settings');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('/guest', function () {
    return view('auth.guest');
})->name('guest');

Route::get('/employee', function () {
    return view('admin.employee');
})->name('employee');

Route::get('/clocking', function () {
    return view('auth.clocking');
})->name('clocking');

Route::get('/clockingform', function () {
    return view('staff.clockingform');
})->name('clockingform');

Route::get('/guestclockingform', function () {
    return view('guest.guestclockingform');
})->name('guestclockingform');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/clocking', [AuthController::class, 'clocking'])->name('clocking');



Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
Route::post('/attendance/datatime', [AttendanceController::class, 'datatime'])->name('datatime');
Route::post('/attendance/store2', [AttendanceController::class, 'store2'])->name('attendance.store2');


Route::post('/register', [AuthController::class, 'register'])->name('register');

//guest clocking should be different
Route::post('/clockval', [GuestController::class, 'clockval'])->name('clockval');