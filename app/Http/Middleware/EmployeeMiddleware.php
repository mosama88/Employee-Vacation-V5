<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('employee')->check() && Auth::guard('employee')->user()->type == 'employee') {
            return $next($request);
        }

        return redirect()->route('employee.login')->with('error', 'ليس لديك صلاحية الوصول إلى هذه الصفحة.');
    }
}
