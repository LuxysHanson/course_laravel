<?php

namespace App\Repositories;

use App\Interfaces\NewsParserInterface;
use App\Interfaces\NewsRepositoryInterface;
use App\Interfaces\ParserRepositoryInterface;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParserRepository implements ParserRepositoryInterface
{

    /** @var NewsRepositoryInterface $newsRepository */
    private $newsRepository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function parsingNews(NewsParserInterface $parser, int $limit = 10): bool
    {
        $data = $parser->getParsingData($limit);

        DB::beginTransaction();

        if (!empty($data)) {
            foreach ($data as $item) {

                $category = Category::query()->firstOrNew([
                    'title' => $item['category'] ?? '',
                    'slug' => $item['category'] ? Str::slug($item['category']) : '',
                    'description' => null
                ]);

                if (empty($category->title) && !$category->save()) {
                    DB::rollBack();
                    return false;
                }

                $news = $this->inThereNewsSystem($item['title'] ?? '');
                $news->fill($item);
                $news->category_id = $category->id;

                if (!$news->save()) {
                    DB::rollBack();
                    return false;
                }
            }
        }

        DB::commit();
        return true;
    }

    protected function inThereNewsSystem(string $title): News
    {
        $news = $this->getAllNews();
        if (!empty($news)) {
            foreach ($news as $item) {
                if (stristr($title, $item->title)) {
                    return $item;
                }
            }
        }
        return new News();
    }

    private static $_news = [];
    private function getAllNews(): array
    {
        return !empty(self::$_news) ? self::$_news : $this->newsRepository->getNewsList();
    }

}
