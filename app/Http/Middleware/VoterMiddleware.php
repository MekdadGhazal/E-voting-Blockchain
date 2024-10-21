<?php

namespace App\Http\Middleware;

use App\Models\Code;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Voter Middleware
 * @package Middleware
 */
class VoterMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $query = DB::table('codes')->where('code', 'like', '%' . $request->code . '%')->first();

        if ($query->is_used != '0') {
            return redirect()->route('vote.fail');
        }
        $request->attributes->set('code' , $query->code);
        return $next($request);
    }
}
