<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('news_category')->insert($newsCategoryData);
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
