<?php

namespace App\Models;

use Illuminate\Support\Str;

class News
{

    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'slug' => 'novost1',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'slug' => 'novost2',
            'category_id' => 2
        ]
    ];

    public static function getNews()
    {
//        dump(Str::slug('Новость 1'));
        return static::$news;
    }

    public static function getNewsId($id)
    {
        return self::$news[$id] ?? [];
    }

}
