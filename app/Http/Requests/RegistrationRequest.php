<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'surname' => 'required|string|max:45',
            'name' => 'required|string|max:45',
            'patronymic' => 'nullable|string|max:45',
            'passport' => 'required|string|unique:people,passport|max:45',
            'login' => 'required|unique:user_accounts,login|max:75',
            'password' => 'required|min:8|max:75',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(): array{
        return [
            'surname.required' => 'Фамилия не была введена!',
            'name.required' => 'Имя не было введено!',
            'passpord.required' => 'Паспортные данные не были введены!',
            'passport.unique' => 'Учётная запись с данным паспортом уже зарегистрирована!',
            'passport.max' => 'Введённый паспорт превышает 10 символов (серия: 4 символа, номер: 6 символов)!',
            'login.required' => 'Логин для входа в учётную запись не был указан!',
            'login.unique' => 'Данный логин уже используется одним из пользователей!',
            'login.max' => 'Логин не может содержать более 75 символов!',
            'password.required' => 'Пароль для доступа в учётную запись не был введён!',
            'password.min' => 'Указанный пароль содержит менее 8 символов!',
            'password.max' => 'Пароль превышает 75 символов!',
            'password_confirmation.required' => 'Подтвердите пароль!',
            'password_confirmation.same' => 'Введённые пароли не совпадают!'
        ];
    }
}
