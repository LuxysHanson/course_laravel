<?php

namespace App\Http\Controllers\Auth;

use App\Components\Enums\SocialTypeEnum;
use App\Http\Controllers\Controller;
use App\Interfaces\SocialRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    /** @var SocialRepositoryInterface $repository */
    private $repository;

    public function __construct(SocialRepositoryInterface $socialRepository)
    {
        $this->repository = $socialRepository;
    }

    public function login(string $driver)
    {
        $social_type = SocialTypeEnum::labels()[$driver] ?? '';
        return Auth::check()
            ? redirect()->route('home')
            : Socialite::driver($social_type)->redirect();
    }

    public function response(string $driver)
    {
        $social_type = SocialTypeEnum::labels()[$driver] ?? '';
        $socialUser = Socialite::driver($social_type)->user();
        $user = $this->repository->getUserBySocialNetwork($socialUser, $social_type);
        Auth::login($user);

        return redirect()->route('home');
    }

}
