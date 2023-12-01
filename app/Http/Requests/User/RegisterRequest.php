<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=> ['required','string'],
            'phone'=> ['required','unique:users'],
            'email'=> ['required','email','unique:users'],
            'picture'=>['nullable','mimes:jpg,png,bmp'],
            'typeId'=> ['required'],
            'commercialRegistrationNumber'=> ['required_if:typeId,=,1','unique:merchant_details,commercial_registration_number'],
            'taxRegistrationNumber'=> ['required_if:typeId,=,1','tax_registration_number'],

        ];
    }

    public function messages(): array
    {
        return 
        [
            'commercialRegistrationNumber'=> 'Commercial registration number is required if type is merchant',
            'taxRegistrationNumber'=> 'tax registration number is required if type is merchant',
        ];

    }
}
