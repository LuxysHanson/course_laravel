<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Category
{

    private $_news;

    public function __construct(News $news)
    {
        $this->_news = $news;
    }

    // Получает категории из файла
    public static function getCategories(): array
    {
        return json_decode(File::get(storage_path() . '/categories.json'), true) ?: [];
    }

}
