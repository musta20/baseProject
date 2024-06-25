<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveJobRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'min:3'],

            'cert' => ['required', 'string', 'max:100', 'min:3'],
            'exp' => ['required', 'numeric'],
            'exp_des' => ['required', 'string', 'max:100', 'min:3'],

            'city' => ['required', 'string', 'max:100', 'min:3'],
            'Jobcity' => 'required|string|max:100|min:1',

            'majer' => ['required', 'string', 'max:100', 'min:3'],

            'job_id' => ['required'],
            'about' => ['required', 'string', 'max:100', 'min:3'],
            'cv' => ['required', 'max:2048', 'mimes:pdf'],
        ];
    }
}
