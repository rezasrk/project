<?php

namespace App\Http\Middleware;

use Closure;

class VerifyEmailMiddleware
{
    /**
     * check user verify email
     *
     * @param $request
     * @param Closure $next
     * @return mixed|void
     */
    public function handle($request, Closure $next)
    {
        if(auth('front')->user()->email_verified_at){
            return $next($request);
        }
        return abort(403,'لطفا ابتدا ایمیل خود را تایید نمایید .');
    }
}
