<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class News
{

    public function getNews(): array
    {
        $news = File::get(storage_path() . '/news.json');
        return json_decode($news, JSON_OBJECT_AS_ARRAY) ?: [];
    }

    public function getSortedNews(): array
    {
        $dateArray = [];
        $news = $this->getNews();
        if (!empty($news)) {
            foreach($news as $id => $arr){
                $dateArray[$id] = $arr['created_at'];
            }
        }

        array_multisort($dateArray, SORT_STRING, $news);
        return $news;
    }

    public function getNewsById(int $id): array
    {
        return $this->getNews()[$id] ?? [];
    }

    public function getLatestNews(int $limit = 3): array
    {
        $news = $this->getSortedNews();
        return array_slice($news, 0, $limit);
    }

    /*public function getShortText(int $length = 250): string
    {
        dd($this);
    }*/

}
