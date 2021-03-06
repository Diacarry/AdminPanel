<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class DetectLanguage
{
    /**
     * Handle an incoming request (BeforeMiddleware).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $info = Auth::user();
        app()->setLocale($info->language);
        return $next($request);
    }
}
