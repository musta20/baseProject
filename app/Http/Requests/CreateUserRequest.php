<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => 'unique:users|required|email|max:255|min:3',
            'password' => 'required|string|max:25|min:6',
            'name' => 'required|string|max:100|min:3',
            'role' => 'required',
            'img' => 'max:2048|mimes:jpg,jpeg,png',

        ];
    }
}
