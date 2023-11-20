<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStaffWebRequest extends FormRequest
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
    // {
    //     $rules = [
    //         'edit_txt_id' => 'required',
    //         'edit_txt_new_staff_id' => 'numeric|unique:staff,staff_id',
    //         'edit_txt_staff_name' => 'required',
    //         'edit_txt_staff_status' => 'numeric|required',
    //         'edit_txt_staff_password' => 'min:4|required',
    //     ];

    //     // Exclude validation if the field is not present in the request
    //     if (!$this->has('edit_txt_new_staff_id')) {
    //         unset($rules['edit_txt_new_staff_id']);
    //     }

    //     if (!$this->has('edit_txt_staff_name')) {
    //         unset($rules['edit_txt_staff_name']);
    //     }

    //     if (!$this->has('edit_txt_staff_status')) {
    //         unset($rules['edit_txt_staff_status']);
    //     }

    //     if (!$this->has('edit_txt_staff_password')) {
    //         unset($rules['edit_txt_staff_password']);
    //     }

    //     return $rules;
    // }
    {
        $rules = [
            'edit_txt_id' => 'required',
        ];

        if ($this->filled('edit_txt_new_staff_id')) {
            $rules['edit_txt_new_staff_id'] = 'numeric|unique:staff,staff_id';
        }

        if ($this->filled('edit_txt_staff_name')) {
            $rules['edit_txt_staff_name'] = 'required';
        }

        if ($this->filled('edit_txt_staff_status')) {
            $rules['edit_txt_staff_status'] = 'numeric|required';
        }

        if ($this->filled('edit_txt_staff_password')) {
            $rules['edit_txt_staff_password'] = 'min:4|required';
        }

        return $rules;
    }

    // public function messages(): array
    // {
    //     return [
    //         'edit_txt_id.required' => 'ID is required.',
    //         'edit_txt_new_staff_id.required' => 'The staff ID is required.',
    //         'edit_txt_new_staff_id.numeric' => 'The staff ID must be a number.',
    //         'edit_txt_new_staff_id.unique' => 'The staff ID must be unique.',
    //         'edit_txt_staff_name.required' => 'The staff name is required.',
    //         'edit_txt_staff_status.required' => 'The status is required.',
    //         'edit_txt_staff_status.numeric' => 'The status must be a number.',
    //         'edit_txt_staff_password.required' => 'The password is required.',
    //         'edit_txt_staff_password.min' => 'The password must be at least :min characters.',
    //     ];
    // }
    // public function messages(): array
    // {
    //     return [
    //         'edit_txt_id.required' => 'ID is required.',
    //         'edit_txt_new_staff_id.numeric' => 'The staff ID must be a number.',
    //         'edit_txt_new_staff_id.unique' => 'The staff ID must be unique.',
    //         'edit_txt_new_staff_id.required' => 'The staff ID is required when updating.',
    //         'edit_txt_staff_name.required' => 'The staff name is required when updating.',
    //         'edit_txt_staff_status.required' => 'The status is required when updating.',
    //         'edit_txt_staff_status.numeric' => 'The status must be a number.',
    //         'edit_txt_staff_password.required' => 'The password is required when updating.',
    //         'edit_txt_staff_password.min' => 'The password must be at least :min characters.',
    //     ];
    // }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
