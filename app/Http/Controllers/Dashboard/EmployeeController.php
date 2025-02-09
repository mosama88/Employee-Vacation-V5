<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EmployeeRequest;
use App\Models\Branch;
use App\Models\JobGrade;
use App\Models\WeeklyRest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::orderByDesc('id')->paginate(10);
        return view('dashboard.employees.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['branches'] = Branch::get();
        $other['job_grades'] = JobGrade::get();
        $other['weekly_rests'] = WeeklyRest::get();

        return view('dashboard.employees.create', compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request, Employee $employee)
    {

        $last_employee_code = Employee::orderByDesc('employee_code')->value('employee_code');
        $new_employee_code = $last_employee_code ? $last_employee_code + 'EMP1'  : 'EMP1';
        $employee->employee_code = $new_employee_code;
        $employee->created_by = auth('admin')->user->id;
        $employee->create($request->validated());
        return redirect()->route('dashboard.employees.index')->with('success', 'تم أضافة الموظف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $other['branches'] = Branch::get();
        $other['job_grades'] = JobGrade::get();
        $other['weekly_rests'] = WeeklyRest::get();

        return view('dashboard.employees.edit', compact('other'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}