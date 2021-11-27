<?php

namespace App\Interfaces;

use App\Http\Requests\CategoriesRequest;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function dataStorage(CategoriesRequest $request, Category $category);
    public function dataExport(int $type);

}
