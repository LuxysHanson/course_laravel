<?php

namespace App\Repositories;

use App\Components\Enums\News\ExportTypeEnum;
use App\Components\Helpers\ImageHelper;
use App\Exports\NewsExport;
use App\Http\Requests\NewsRequest;
use App\Interfaces\NewsRepositoryInterface;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class NewsRepository implements NewsRepositoryInterface
{

    public function getCategoryList(): array
    {
        return Category::query()->pluck('title', 'id')->all();
    }

    public function dataStorage(NewsRequest $request, News $news)
    {
        $request->validated();

        $news->fill($request->all());
        $news->slug = Str::slug($news->title);
        $news->image = ImageHelper::getImageUrlToSaving($request->file('image'));
        $news->save();
    }

    public function dataExport(int $type)
    {
        $fileName = 'news_list_'. date('Y-m-d_H_i');

        if ($type != ExportTypeEnum::TYPE_JSON) {
            return Excel::download(new NewsExport,  $fileName. '.xlsx');
        }

        $allNews = News::query()->get()->all();
        return response()->json($allNews)
            ->header('Content-Disposition', 'attachment; filename = '. $fileName .'.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function getNewsList(): array
    {
        return News::query()->get()->all();
    }

}
