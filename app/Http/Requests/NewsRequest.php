<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|max:255|string|min:5',
            'description' => 'required|min:5',
            'category_id' => "required|exists:App\Models\Category,id",
            'image' => 'mimes:jpeg,bmp,png|max:1000'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок новости',
            'description' => 'Текст новости',
            'category_id' => 'Категория новости',
            'image' => 'Изображение'
        ];
    }

}
