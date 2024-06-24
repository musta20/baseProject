<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendContactRequest extends FormRequest
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
            'phone' => ['required', 'numeric', 'digits_between:10,10'],
            'email' => ['required', 'email', 'max:100', 'min:3'],
            'fname' => ['required', 'string', 'max:100', 'min:3'],
            'lname' => ['required', 'string', 'max:100', 'min:3'],
            'msg' => ['required', 'string', 'max:100', 'min:3'],
        ];
    }
}
