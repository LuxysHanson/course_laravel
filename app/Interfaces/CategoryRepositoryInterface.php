<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function dataStorage(Request $request, Category $category);
    public function dataExport(int $type);

}
