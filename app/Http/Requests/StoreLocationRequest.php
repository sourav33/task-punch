<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLocationRequest extends FormRequest
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
            'datetime' => 'required|date_format:Y-m-d H:i:s', // Adjust the format if needed
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }


    public function messages(): array
    {
        return [
            'staff_id.required' => 'The staff id is required.',
            'staff_id.integer' => 'The staff id must be a numeric value.',
            // 'date.required' => 'The date is required.',
            // 'date.date_format' => 'The date must be in the format YYYY-MM-DD.',
            'datetime.required' => 'The datetime field is required.',
            'datetime.date_format' => 'The datetime field must be in the format Y-m-d H:i:s.',
            'latitude.required' => 'The latitude is required.',
            'latitude.numeric' => 'The latitude must be a numeric value.',
            'longitude.required' => 'The longitude is required.',
            'longitude.numeric' => 'The longitude must be a numeric value.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'errors' => $validator->errors()], 400));

    }
}
