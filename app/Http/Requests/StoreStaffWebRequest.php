<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStaffWebRequest extends FormRequest
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
            'add_txt_staff_id' => 'required|numeric|unique:staff,staff_id',
            'add_txt_staff_name' => 'required',
            'add_txt_staff_status' => 'required|numeric',
            'add_txt_staff_password' => 'required|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'add_txt_staff_id.required' => 'The staff ID is required.',
            'add_txt_staff_id.numeric' => 'The staff ID must be a number.',
            'add_txt_staff_id.unique' => 'The staff ID must be unique.',
            'add_txt_staff_name.required' => 'The staff name is required.',
            'add_txt_staff_status.required' => 'The status is required.',
            'add_txt_staff_status.numeric' => 'The status must be a number.',
            'add_txt_staff_password.required' => 'The password is required.',
            'add_txt_staff_password.min' => 'The password must be at least :min characters.',
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
