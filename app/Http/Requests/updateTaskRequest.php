<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateTaskRequest extends FormRequest
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
            "title" => ["required","string","max:100","min:3"],
            "des" => ["required","string","max:255","min:3"],
            // "user_id" => "required|string|max:255|min:3",
            "user_id" => ["required"],
            "isdone" => ["required","integer"],
    
            "start" => ["required","date"],
            "end" =>   ['required','date','after:start']
        ];
    }
}
