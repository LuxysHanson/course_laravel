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
        $newsCategoryData = [
            [
                "title" => "Спорт",
                "slug" => "sport",
                "description" => "Следует отметить, что глубокий уровень погружения создаёт предпосылки для позиций, занимаемых участниками в отношении поставленных задач."
            ],
            [
                "title" => "Политика",
                "slug" => "politics",
                "description" => "Принимая во внимание показатели успешности, реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании приоритизации разума над эмоциями."
            ],
            [
                "title" => "Технологии",
                "slug" => "technology",
                "description" => "Каждый из нас понимает очевидную вещь: синтетическое тестирование играет важную роль в формировании вывода текущих активов. Идейные соображения высшего порядка, а также семантический разбор внешних противодействий обеспечивает актуальность благоприятных перспектив."
            ],
            [
                "title" => "Бизнес",
                "slug" => "business",
                "description" => "В своём стремлении улучшить пользовательский опыт мы упускаем, что тщательные исследования конкурентов освещают чрезвычайно интересные особенности картины в целом, однако конкретные выводы, разумеется, смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности."
            ]
        ];

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
