<?php

namespace App\Rules;

use App\Components\Enums\NewsParserEnum;
use Illuminate\Contracts\Validation\Rule;

class ParserSource implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $class = NewsParserEnum::getClassByParse((int)$value);
        return !empty($class);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Не найден класс для парсинга данного источника';
    }

}
