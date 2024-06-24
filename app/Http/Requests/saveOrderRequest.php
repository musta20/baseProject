<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveOrderRequest extends FormRequest
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
            'count' => 'integer|digits_between:1,50',
            'delivery_id' => 'required',
            'payment_id' => 'required',

            'email' => 'required|email|max:100|min:3',
            'title' => 'required|string|max:100|min:3',
            'name' => 'required|string|max:100|min:3',
            //  "adress" => "required|string|max:255|min:3",

            'time' => 'required|date',
            'name' => 'required|string|max:100|min:3',
            'des' => 'nullable|string|max:255|min:5',
            'phone' => 'required|numeric|digits_between:10,10',
        ];
    }
}
