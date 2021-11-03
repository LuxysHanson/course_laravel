<?php

namespace App\Models;

use Illuminate\Support\Str;

class Categories
{

    private static $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'slug' => 'sport'
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'text' => 'А тут плохие новости(((',
            'slug' => 'politika'
        ]
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryId($id)
    {
        return self::$categories[$id] ?? [];
    }

    public static function getNewsByCategory($id)
    {
        $news = array_filter(News::getNews(), function ($item) use ($id) {
            return $item['category_id'] == $id;
        });
        return $news ?: [];
    }

}
