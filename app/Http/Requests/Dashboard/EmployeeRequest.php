<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'employee_code' => ['nullable', 'numeric', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:employees,username', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'mobile' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'alt_mobile' => ['nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:15'],
            'birth_date' => ['required', 'date', 'before:today'],
            'start_work' => ['required', 'date', 'after:birth_date'],
            'leave_balance' => ['required', 'numeric', 'min:0'],
            'gender' => ['nullable', 'in:male,female'],
            'type' => ['required', 'in:employee,manager'],
            'branch_id' => ['required', 'exists:branches,id'],
            'weekly_rest_id' => ['required', 'exists:weekly_rests,id'],
            'job_grade_id' => ['required', 'exists:job_grades,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'اسم الموظف مطلوب.',
            'username.required' => 'اسم المستخدم مطلوب.',
            'username.unique' => 'اسم المستخدم مستخدم بالفعل.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.min' => 'يجب أن تكون كلمة المرور على الأقل 6 أحرف.',
            'mobile.required' => 'رقم الجوال مطلوب.',
            'mobile.regex' => 'رقم الجوال غير صالح.',
            'alt_mobile.regex' => 'رقم الجوال البديل غير صالح.',
            'birth_date.required' => 'تاريخ الميلاد مطلوب.',
            'birth_date.before' => 'يجب أن يكون تاريخ الميلاد قبل اليوم الحالي.',
            'start_work.required' => 'تاريخ بدء العمل مطلوب.',
            'start_work.after' => 'تاريخ بدء العمل غير صحيح.',
            'leave_balance.required' => 'رصيد الإجازات مطلوب.',
            'leave_balance.numeric' => 'يجب أن يكون رصيد الإجازات رقمًا.',
            'leave_balance.min' => 'لا يمكن أن يكون رصيد الإجازات سالبًا.',
            'gender.in' => 'الجنس يجب أن يكون "ذكر" أو "أنثى".',
            'type.required' => 'نوع الحساب مطلوب".',
            'type.in' => 'النوع يجب أن يكون "موظف" أو "مدير".',
            'branch_id.required' => 'الفرع مطلوب.',
            'branch_id.exists' => 'الفرع غير موجود.',
            'weekly_rest_id.required' => 'الراحة الأسبوعية مطلوبة.',
            'weekly_rest_id.exists' => 'الراحة الأسبوعية غير موجودة.',
            'job_grade_id.required' => 'الدرجة الوظيفية مطلوبة.',
            'job_grade_id.exists' => 'الدرجة الوظيفية غير موجودة.',
        ];
    }
}