<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|min:4"
        ];
    }

    public function messages(): array
    {
        return [
            "email.unique" => "This email is already registered. Please log in instead.",
            "password.min" => "Your password must be at least 4 characters long for security.",
        ];
    }
}
