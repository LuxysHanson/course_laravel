<?php

namespace App\Repositories;

use App\Interfaces\NewsParserInterface;
use App\Interfaces\ParserRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Str;

class ParserRepository implements ParserRepositoryInterface
{

    public function parsingNews(NewsParserInterface $parser, int $limit = 10)
    {
        $data = $parser->getParsingData($limit);
        if (!empty($data)) {
            foreach ($data as $item) {
                $category = Category::query()->firstOrCreate([
                    'title' => $item['category'] ?? '',
                    'slug' => isset($item['category']) && $item['category'] ? Str::slug($item['category']) : '',
                    'description' => null
                ]);
                dd($category);
            }
        }

        dd('***');
    }

}
