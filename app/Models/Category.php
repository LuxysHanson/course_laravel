<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'news_category';

    protected $fillable = [
        'title',
        'description'
    ];

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
