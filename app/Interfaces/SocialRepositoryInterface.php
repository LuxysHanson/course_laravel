<?php

namespace App\Interfaces;

use Laravel\Socialite\Contracts\User;

interface SocialRepositoryInterface
{
    public function getUserBySocialNetwork(User $socialUser, string $socialType);

}
