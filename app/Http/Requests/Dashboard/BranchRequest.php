<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'phone' => 'required|numeric|digits_between:7,15',
            'address' => 'required|string|max:500',
            'governorate_id' => 'required|exists:governorates,id',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'يجب إدخال اسم الفرع.',
            'name.string' => 'يجب أن يكون اسم الفرع نصًا.',
            'name.max' => 'يجب ألا يزيد اسم الفرع عن 255 حرفًا.',

            'phone.required' => 'يجب إدخال رقم الهاتف.',
            'phone.numeric' => 'يجب أن يكون رقم الهاتف أرقام فقط.',
            'phone.digits_between' => 'يجب أن يكون رقم الهاتف بين 7 و 15 رقمًا.',

            'address.required' => 'يجب إدخال عنوان الفرع.',
            'address.string' => 'يجب أن يكون العنوان نصًا.',
            'address.max' => 'يجب ألا يزيد العنوان عن 500 حرف.',

            'governorate_id.required' => 'يجب اختيار المحافظة.',
            'governorate_id.exists' => 'المحافظة المختارة غير صحيحة.',
        ];
    }
}