<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;

class UsersExport implements FromArray
{

    public function array(): array
    {
        return User::query()->get()->all();
    }

}
