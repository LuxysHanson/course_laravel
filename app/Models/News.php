<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class News extends Model
{

    // Получает новости из файла
    public static function getNews(): array
    {
        return json_decode(File::get(storage_path() . '/news.json'), true) ?: [];
    }

}
