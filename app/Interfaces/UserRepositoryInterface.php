<?php

namespace App\Interfaces;

use App\Http\Requests\UsersRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function dataStorage(UsersRequest $request, User $user);
    public function dataExport(int $type);

}
