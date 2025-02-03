<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'username' => 'required|string|unique:clients',
            'group_id' => 'required|exists:groups,id',
            'type' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:clients',
            'register_date' => 'required|date',
        ];
    }
}
