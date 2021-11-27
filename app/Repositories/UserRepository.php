<?php

namespace App\Repositories;

use App\Components\Enums\News\ExportTypeEnum;
use App\Exports\UsersExport;
use App\Http\Requests\UsersRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class UserRepository implements UserRepositoryInterface
{

    public function dataStorage(UsersRequest $request, User $user)
    {
        $request->validated();
        $user->fill($request->all())->save();
    }

    public function dataExport(int $type)
    {
        $fileName = 'users_list_'. date('Y-m-d_H_i');

        if ($type != ExportTypeEnum::TYPE_JSON) {
            return Excel::download(new UsersExport(),  $fileName. '.xlsx');
        }

        $allNews = User::query()->get()->all();
        return response()->json($allNews)
            ->header('Content-Disposition', 'attachment; filename = '. $fileName .'.txt')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
