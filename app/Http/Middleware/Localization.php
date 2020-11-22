<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')){

            $locale = Session::get('locale');

            if (! in_array($locale, ['en', 'ru', 'uz'])) {
                return $next($request);
            }

            App::setLocale($locale);
        }

        return $next($request);
    }
}
