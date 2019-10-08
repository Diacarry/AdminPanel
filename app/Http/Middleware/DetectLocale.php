<?php

namespace App\Http\Middleware;

use Closure;

class DetectLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$locales)
    {
        /*$locales = $locales ?: ['en'];
        if ($language = $request->getPreferredLanguage($locales)) {
            app()->setLocale($language);
        }*/
        //app()->setLocale($request->segment(1));

        return $next($request);
    }
}
