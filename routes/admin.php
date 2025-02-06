<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Auth\AdminLogin;
use App\Http\Controllers\Auth\EmployeeLogin;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;




Route::get('/', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('guest')->group(function () {


    //########################  Employee Login  ###################################

    Route::get('employee/login', [EmployeeLogin::class, 'index'])
        ->name('employee.login');

    Route::post('employee/login', [EmployeeLogin::class, 'store']);
    //########################  Admin Login  ###################################

    Route::get('admin/login', [AdminLogin::class, 'index'])
        ->name('admin.login');

    Route::post('admin/login', [AdminLogin::class, 'store']);


    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    // Route::get('login', [AuthenticatedSessionController::class, 'create'])
    //     ->name('login');

    // Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //     ->name('password.request');

    // Route::post('forgot-password', [Pass wordResetLinkController::class, 'store'])
    //     ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //     ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //     ->name('password.store');
});
