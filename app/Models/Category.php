<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{

    protected $table = 'news_category';

    // Получает категории из файла
    public static function getCategories(): array
    {
        return json_decode(File::get(storage_path() . '/categories.json'), true) ?: [];
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

}
