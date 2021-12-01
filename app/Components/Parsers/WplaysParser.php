<?php

namespace App\Components\Parsers;

use App\Interfaces\NewsParserInterface;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WplaysParser extends BaseParser implements NewsParserInterface
{

    public function getLink(): string
    {
        return 'https://wplays.ru/rss/feed/news';
    }

    protected function dataGeneration(array $data): array
    {
        $newsData = [];
        $categories = Category::query()->pluck('title', 'id')->all();
        foreach ($data as $key => $item) {
            $newsData[] = [
                'title' => $item['title'] ?? '',
                'slug' => $item['title'] ? Str::slug($item['title']) : '',
                'description' => $item['description'] ?? '',
                'category' => $this->getRandomCategoryName($categories),
                'image' => $item['enclosure::url'] ?? null
            ];
            if (isset($item['pubDate']) && $item['pubDate']) {
                $newsData[$key]['created_at'] = Carbon::parse($item['pubDate'])->format('Y-m-d H:i:s');
            }
        }
        return $newsData;
    }

    private function getRandomCategoryName(array $categories): string
    {
        $categoryIds = array_keys($categories) ?? [];
        $random_category_id = rand($categoryIds[0], end($categoryIds));
        return $categories[$random_category_id] ?? '';
    }

}
