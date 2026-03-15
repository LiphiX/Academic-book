<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
                'login' => 'required|max:75',
                'password' => 'required|min:8|max:75',
        ];
    }

    public function messages(): array{
        return [
            'login.required' => 'Логин для входа в учётную запись не был указан!',
            'login.max' => 'Логин не может содержать более 75 символов!',
            'password.required' => 'Пароль для доступа в учётную запись не был введён!',
            'password.min' => 'Указанный пароль содержит менее 8 символов!',
            'password.max' => 'Пароль превышает 75 символов!'
        ];
    }
}
