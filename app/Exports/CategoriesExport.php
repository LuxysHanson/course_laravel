<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromArray;

class CategoriesExport implements FromArray
{

    public function array(): array
    {
        return Category::query()->get()->all();
    }

}
