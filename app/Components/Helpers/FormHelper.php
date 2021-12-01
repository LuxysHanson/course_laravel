<?php

namespace App\Components\Helpers;

use Illuminate\Support\ViewErrorBag;

class FormHelper
{

    public static function getClassByErrors(ViewErrorBag $error, string $field, string $classes = '')
    {
        $errors = $error->get($field);
        return !empty($errors) ? $classes. ' is-invalid' : $classes;
    }

}
