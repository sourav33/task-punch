<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckStaffAttendanceRequest extends FormRequest
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
            'staff_id' => 'required|integer',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ];
    }


    public function messages(): array
    {
        return [
            'staff_id.required' => 'The staff id is required.',
            'staff_id.integer' => 'The staff id must be a numeric value.',
            'start_date.required' => 'The start date is required.',
            'start_date.date_format' => 'The start date must be in the format YYYY-MM-DD.',
            'end_date.required' => 'The end date is required.',
            'end_date.date_format' => 'The end date must be in the format YYYY-MM-DD.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
