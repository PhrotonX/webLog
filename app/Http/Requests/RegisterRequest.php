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
            'signup-username' => [
                'required',
                'string',
                'max:255',
                'unique:App\Models\User,username',
            ],
            'signup-handle' => [
                "distinct:string",
                "unique:App\Models\User,handle",
            ],
            'signup-email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:App\Models\User,email'],
            'signup-password' => ['required'],
        ];
    }
}
