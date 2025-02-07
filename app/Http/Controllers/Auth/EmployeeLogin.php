<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\EmployeeLoginRequest;

class EmployeeLogin extends Controller
{
    public function index()
    {
        return view('dashboard.auth.employees.login');
    }


    public function store(EmployeeLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (auth()->guard('employee')->check()) {
            $user = auth()->guard('employee')->user();

            if ($user->type == 'manager') {
                return redirect()->route('dashboard.employees.manager');
            }

            if ($user->type == 'employee') {
                return redirect()->route('dashboard.employees');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
