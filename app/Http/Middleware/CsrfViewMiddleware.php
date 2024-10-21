<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class CsrfViewMiddleware
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
        View::share('csrf', [
            'field' => '
                <input type="hidden" name="' . csrf_token() . '">
                <input type="hidden" name="_token" value="' . csrf_token() . '">
            ',
        ]);

        return $next($request);
    }
}
