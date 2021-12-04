<?php

namespace App\Components\Parsers;

use App\Interfaces\NewsParserInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class LentaRuParser extends BaseParser implements NewsParserInterface
{

    public function getLink(): string
    {
        return 'https://lenta.ru/rss';
    }

    protected function dataGeneration(array $data): array
    {
        $newsData = [];
        foreach ($data as $key => $item) {
            $newsData[] = [
                'title' => $item['title'] ?? '',
                'slug' => $item['title'] ? Str::slug($item['title']) : '',
                'description' => $item['description'] ?? '',
                'category' => $item['category'] ?? '',
                'image' => $item['enclosure::url'] ?? null
            ];
            if (isset($item['pubDate']) && $item['pubDate']) {
                $newsData[$key]['created_at'] = Carbon::parse($item['pubDate'])->format('Y-m-d H:i:s');
            }
        }
        return $newsData;
    }

}
