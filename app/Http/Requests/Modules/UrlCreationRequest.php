<?php

namespace App\Http\Requests\Modules;

use Illuminate\Foundation\Http\FormRequest;

class UrlCreationRequest extends FormRequest
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
            "custom_code" => "nullable|max:10",
            "original_url" => "required|string|url"
        ];
    }


    public function messages(): array
    {
        return [
            "original_url.required" => "The original_url is required"
        ];
    }
}
