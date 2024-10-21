<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RAMiddleware
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
        if (!Auth::check()) {
            Session::flash('error', 'Please sign in before doing that');
            return Redirect::route('auth.signin');
        } elseif (Auth::user()->role != 1) {
            Session::flash('error', 'This page is only accessible to the registration authority');
            return Redirect::route('home');
        }

        return $next($request);
    }
}
