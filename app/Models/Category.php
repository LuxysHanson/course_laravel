<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Category
{

    // Получает категории из файла
    public static function getCategories(): array
    {
        return json_decode(File::get(storage_path() . '/categories.json'), true) ?: [];
    }

}
