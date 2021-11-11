<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromArray;

class NewsExport implements FromArray
{

    public function array(): array
    {
        return (new News())->getNews();
    }

}
