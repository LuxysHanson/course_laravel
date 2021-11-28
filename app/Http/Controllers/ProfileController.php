<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
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

    public function index()
    {
        return $this->render('index')->with('user', Auth::user());
    }

    public function update(ProfileRequest $request, User $user)
    {
        $this->repository->profileChange($request, $user);
        return redirect()->route('profile');
    }

}
