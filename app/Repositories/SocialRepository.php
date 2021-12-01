<?php

namespace App\Repositories;

use App\Interfaces\SocialRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\AuthSocial;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as UserOAuth2;

class SocialRepository implements SocialRepositoryInterface
{

    /** @var UserRepositoryInterface $userRepository */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserBySocialNetwork(UserOAuth2 $socialUser, string $socialType)
    {
        if ($email = $socialUser->getEmail()) {
            $user = $this->userRepository->getUserByCondition([
                'email' => $email
            ]);

            if ($user) return $user;
        }

        $authSocial = AuthSocial::query()->where([
            'social_id' => $socialUser->getId(),
            'type' => $socialType
        ])->with(['user'])->first();

        if ($authSocial)
            return $authSocial->user;

        DB::beginTransaction();

        $user = new User();
        $userEmail = $socialUser->getEmail() ?: ($socialUser->getNickname() ?? '');
        $user->fill([
            'name' => $socialUser->getName() ?? '',
            'email' => $userEmail,
            'password' => Hash::make($userEmail),
            'email_verified_at' => now(),
            'avatar' => $socialUser->getAvatar(),
        ]);

        if (!$user->save()) {
            DB::rollBack();
            return false;
        }

        $authSocial = new AuthSocial();
        $authSocial->fill([
            'user_id' => $user->id,
            'social_id' => $socialUser->getId(),
            'type' => $socialType
        ]);

        if (!$authSocial->save()) {
            DB::rollBack();
            return false;
        }

        DB::commit();

        return $user;
    }

}
