<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $prefix_view = 'pages/profile';

    /** @var UserRepositoryInterface $repository */
    private $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function index(UsersRequest $request)
    {
        $user = Auth::user();
        if ($request->isMethod('put')) {
            $this->repository->dataStorage($request, $user);
        }

        return $this->render('index')->with('user', $user);
    }
}
