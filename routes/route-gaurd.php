<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Auth\AdminLogin;
use App\Http\Controllers\Auth\EmployeeLogin;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;




Route::get('/employee', function () {
    return view('dashboard.auth.employees.index');
})->middleware(['auth:employee', 'verified', 'employee'])->name('dashboard.employees');

Route::get('/employee/manager', function () {
    return view('dashboard.auth.employees.manager');
})->middleware(['auth:employee', 'verified', 'manager'])->name('dashboard.employees.manager');



Route::get('/admin', function () {
    return view('dashboard.auth.admins.index');
})->middleware(['auth:admin', 'verified', 'admin'])->name('dashboard.admin');






Route::middleware(['guest:employee'])->group(function () {
    //########################  Employee Login  ###################################
    Route::get('employee/login', [EmployeeLogin::class, 'index'])
        ->name('employee.login');

    Route::post('employee/login', [EmployeeLogin::class, 'store']);
});

//########################  Employee Login  ###################################
Route::middleware(['guest:admin'])->group(function () {
    Route::get('admin/login', [AdminLogin::class, 'index'])
        ->name('admin.login');

    Route::post('admin/login', [AdminLogin::class, 'store']);
});


//########################  Employee Logout  ###################################

Route::middleware('adminLogout')->group(function () {
    Route::post('admin/logout', [AdminLogin::class, 'destroy'])
        ->name('admin.logout');
});


// Route::middleware(['auth:employee', 'auth:admin'])->group(function () {
//     Route::post('employee/logout', [EmployeeLogin::class, 'destroy'])
//         ->name('employee.logout');
// });
