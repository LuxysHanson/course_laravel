<?php

namespace App\Repositories;

use App\Components\Enums\News\ExportTypeEnum;
use App\Exports\CategoriesExport;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function dataStorage(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = Str::slug($category->title);
        $category->save();
    }

    public function dataExport(int $type)
    {
        $fileName = 'categories_list_'. date('Y-m-d_H_i');

        if ($type != ExportTypeEnum::TYPE_JSON) {
            return Excel::download(new CategoriesExport(),  $fileName. '.xlsx');
        }

        $allCategories = Category::query()->get()->all();
        return response()->json($allCategories)
            ->header('Content-Disposition', 'attachment; filename = '. $fileName .'.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
