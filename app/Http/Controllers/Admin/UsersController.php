<?php

namespace App\Http\Controllers\Admin;

use App\Components\Enums\ApplicationEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $prefix_view = 'admin.users';

    /** @var UserRepositoryInterface $repository */
    private $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function index()
    {
        $users = User::query()->orderBy('created_at', 'DESC')->paginate(15);

        return $this->render('index')->with('users', $users);
    }

    public function create()
    {
        return $this->render('create');
    }

    public function edit(User $user)
    {
        return $this->render('edit')->with('user', $user);
    }

    public function show(User $user)
    {
        return $this->render('show')->with('user', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'Пользователь успешно удален!');
    }

    public function update(UsersRequest $request, User $user)
    {
        $this->repository->dataStorage($request, $user);
        return redirect()->route('admin.users.index')->with('message', 'Пользователь успешно изменен!');
    }

    public function store(UsersRequest $request, User $user)
    {
        $this->repository->dataStorage($request, $user);

        if ($request->get('place') === ApplicationEnum::TYPE_FRONTEND) {
            return redirect()->route('profile.index');
        }
        return redirect()->route('admin.users.index')->with('message', 'Пользователь успешно добавлен!');
    }

    public function export(Request $request)
    {
        return $this->repository->dataExport((int)$request->get('type'));
    }

}
