<?php

namespace App\Http\Middleware;

use App\Models\Code;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TallyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $code = Code::where('code', 'like' , $request->code)->first();
        if ($code->is_used) {
            return redirect()->route('vote.fail');
        }
        $request->attributes->set('code', $request->code);
        return $next($request);
    }
}
