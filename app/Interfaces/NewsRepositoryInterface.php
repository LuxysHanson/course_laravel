<?php

namespace App\Interfaces;

use App\Http\Requests\NewsRequest;
use App\Models\News;

interface NewsRepositoryInterface
{
    public function getNewsList();
    public function getCategoryList();
    public function dataStorage(NewsRequest $request, News $news);
    public function dataExport(int $type);

}
