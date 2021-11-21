<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;

class NewsExport implements FromArray
{

    public function array(): array
    {
        return DB::table('news')->get()->all();
    }

}
