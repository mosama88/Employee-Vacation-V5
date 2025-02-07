<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\EmployeeTypeMiddleware;
use App\Http\Middleware\RedirectGuestsMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        then: function () {
            Route::middleware('web')
                ->prefix('dashboard')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->prefix('dashboard')
                ->group(base_path('routes/route-gaurd.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('manager', [
            'manager' => \App\Http\Middleware\ManagerMiddleware::class,
        ]);
        $middleware->appendToGroup('employee', [
            'employee' => \App\Http\Middleware\EmployeeMiddleware::class,
        ]);
        $middleware->redirectGuestsTo('dashboard/employee/login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();