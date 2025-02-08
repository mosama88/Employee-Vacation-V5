<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class JobGradeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'يجب إدخال اسم الدرجه الوظيفية.',
            'name.string' => 'يجب أن يكون اسم الدرجه الوظيفية نصًا.',
            'name.max' => 'يجب ألا يزيد اسم الدرجه الوظيفية عن 255 حرفًا.',
        ];
    }
}