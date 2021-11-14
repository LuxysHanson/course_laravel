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

    public function getCategories(): array
    {
        $news = File::get(storage_path() . '/categories.json');
        return json_decode($news, JSON_OBJECT_AS_ARRAY) ?: [];
    }

    public function getCategoryById(int $id): array
    {
        return $this->getCategories()[$id] ?? [];
    }

    public function getNewsByCategoryId(int $id): array
    {
        $news = array_filter($this->_news->getNews(), function ($item) use ($id) {
            return $item['category_id'] == $id;
        });
        return $news ?: [];
    }

    public function getCategoriesForForm(): array
    {
        $formData = [];
        foreach ($this->getCategories() as $id => $category) {
            $formData[$id] = $category['title'];
        }
        return $formData;
    }

}
