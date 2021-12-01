<?php

namespace App\Http\Middleware;

use App\Components\Enums\UsersRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $isUser = !Auth::guest() && Auth::user()->role != UsersRoleEnum::ROLE_SUPER;
        return $isUser ? redirect()->route('home') : $next($request);
    }
}
