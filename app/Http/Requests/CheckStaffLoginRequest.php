<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckStaffLoginRequest extends FormRequest
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
            'staff_id' => 'required|numeric',
            'password' => 'required|min:4',
        ];
    }


    public function messages(): array
    {
        return [
            'staff_id.required' => 'The staff id field is required.',
            'staff_id.numeric' => 'The staff id must be a numeric value.',
            'password.required' => 'The staff password field is required.',
            'password.min' => 'The staff password must be at least :min characters.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
