<?php

namespace App\Http\Requests;

use App\Rules\ParserSource;
use Illuminate\Foundation\Http\FormRequest;

class ParserNewsRequest extends FormRequest
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
            'source' => ['required', 'numeric', new ParserSource()],
            'limit' => 'required|numeric|min:0|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'limit.not_in' => 'Количество записей не может быть равен 0'
        ];

    }

    public function attributes()
    {
        return [
            'source' => 'Источник для парсинга',
            'limit' => 'Количество записей'
        ];
    }

}
