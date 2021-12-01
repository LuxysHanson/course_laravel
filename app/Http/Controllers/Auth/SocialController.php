<?php

namespace App\Http\Controllers\Auth;

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

    public function loginVK()
    {
        return Auth::check()
            ? redirect()->route('home')
            : Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK()
    {
        $socialUser = Socialite::driver('vkontakte')->user();
        $user = $this->repository->getUserBySocialNetwork($socialUser, 'vkontakte');
        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginGithub()
    {
        return Auth::check()
            ? redirect()->route('home')
            : Socialite::driver('github')->redirect();
    }

    public function responseGithub()
    {
        $socialUser = Socialite::driver('github')->user();
        $user = $this->repository->getUserBySocialNetwork($socialUser, 'github');
        Auth::login($user);

        return redirect()->route('home');
    }

}
