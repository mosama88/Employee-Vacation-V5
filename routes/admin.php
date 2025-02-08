<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\VacationController;


Route::middleware(['auth:admin'])->name('dashboard.')->group(function () {
    // Route::resource('/branches', BranchController::class);
    Route::view('/branches', 'dashboard.branches.index')->name('branchess');
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/vacations', VacationController::class);
});