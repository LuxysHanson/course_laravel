<?php

namespace App\Models;

class Categories
{

    private $_news;

    private $categories = [
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

    public function __construct(News $news)
    {
        $this->_news = $news;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function getCategoryById($id)
    {
        return $this->getCategories()[$id] ?? [];
    }

    public function getNewsByCategoryId($id)
    {
        $news = array_filter($this->_news->getNews(), function ($item) use ($id) {
            return $item['category_id'] == $id;
        });
        return $news ?: [];
    }

}
