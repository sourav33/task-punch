<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStaffRequest extends FormRequest
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
            'current_pass' => 'required',
            'new_pass' => 'required|min:4',
            're_pass' => 'required|same:new_pass',
        ];
    }


    public function messages(): array
    {
        return [
            'staff_id.required' => 'The staff id field is required.',
            'staff_id.numeric' => 'The staff id must be a numeric value.',
            'current_pass.required' => 'The current password field is required.',
            'new_pass.required' => 'The new password field is required.',
            'new_pass.min' => 'The new password must be at least :min characters.',
            're_pass.required' => 'The confirmation password field is required.',
            're_pass.same' => 'The confirmation password must match the new password.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
