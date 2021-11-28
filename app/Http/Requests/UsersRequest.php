<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UsersRequest extends FormRequest
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
            'role' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Адрес электронной почты',
            'password' => 'Пароль',
            'role' => 'Роль'
        ];
    }

}