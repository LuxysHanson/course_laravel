<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'new_password' => 'required|string|min:3|confirmed',
            'role' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Адрес электронной почты',
            'password' => 'Пароль',
            'new_password' => 'Новый пароль',
            'role' => 'Роль'
        ];
    }

}
