<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsCategoryData = $this->getData();
        Category::query()->insert($newsCategoryData);
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create('ru_RU');

        for ($i = 0; $i <= 5; $i++) {
            $newsTitle = $faker->realText(rand(10, 45));
            $data[] = [
                'title' => $newsTitle,
                'slug' => Str::slug($newsTitle),
                'description' => $faker->realText(rand(100,450))
            ];
        }

        return $data;
    }

}
