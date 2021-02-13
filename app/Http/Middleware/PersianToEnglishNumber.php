<?php

namespace App\Http\Middleware;

use Closure;

class PersianToEnglishNumber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->convertNumber($request);
        return $next($request);
    }

    /**
     * convert persian number to english number in all request
     *
     * @param $request
     */
    public function convertNumber($request)
    {
        collect($request->all())->map(function ($key, $value) use ($request) {
            if ($key != "")
                $request->merge([$value => persianToEnglishNumber($key)]);
        });
    }

}
