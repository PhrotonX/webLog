<?php

namespace App\Http\Requests;

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
            'signup-username' => ['required', 'string', 'max:255'],
            'signup-handle' => ["distinct:string"],
            'signup-email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'signup-password' => ['required', 'confirmed', 'min:8'],
            'signup-handle' => ['required', 'regex:[@]\w'],
        ];
    }
}
