<?php

namespace App\Interfaces;

use App\Models\News;
use Illuminate\Http\Request;

interface NewsRepositoryInterface
{
    public function getCategoryList();
    public function dataStorage(Request $request, News $news);
    public function dataExport(int $type);

}
