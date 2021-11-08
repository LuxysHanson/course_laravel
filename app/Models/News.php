<?php

namespace App\Models;

class News
{

    private $news = [
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

    public function getNews()
    {
        return $this->news;
    }

    public function getNewsById($id)
    {
        return $this->getNews()[$id] ?? [];
    }

}
