<?php

namespace Database\Seeders;

use App\Models\News;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsData = $this->getData();
        DB::table('news')->insert($newsData);
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create('ru_RU');

        $categoryIds = DB::table('news_category')->get(['id'])->map(function ($category) {
            return (int)$category->id;
        })->toArray();

        foreach (News::getNews() as $item) {
            $item['category_id'] = rand($categoryIds[0], end($categoryIds));
            $data[] = $item;
        }

        for ($i = 0; $i <= 8; $i++) {
            $newsTitle = $faker->realText(rand(10, 45));
            $data[] = [
                'title' => $newsTitle,
                'slug' => Str::slug($newsTitle),
                'description' => $faker->realText(rand(150,800)),
                'image' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'category_id' => rand($categoryIds[0], end($categoryIds)),
                'is_moderate' => $faker->boolean()
            ];
        }

        return $data;
    }

}
