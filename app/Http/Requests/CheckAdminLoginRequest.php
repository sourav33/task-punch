<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckAdminLoginRequest extends FormRequest
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
            'admin_id' => 'required|numeric',
            'password' => 'required|min:4',
        ];
    }


    public function messages(): array
    {
        return [
            'admin_id.required' => 'The admin id field is required.',
            'admin_id.numeric' => 'The admin id must be a numeric value.',
            'password.required' => 'The admin password field is required.',
            'password.min' => 'The admin password must be at least :min characters.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
