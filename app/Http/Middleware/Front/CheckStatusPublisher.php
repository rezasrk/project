<?php

namespace App\Http\Middleware\Front;

use App\Models\User;
use Closure;

class CheckStatusPublisher
{

    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->user();
        if(optional($user->publisher)->status){
            return $next($request);
        }
        return abort('403','حساب نشریه ی شما توسط ادمین تایید نشده ');
    }
}
