<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     *
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->hasVerifiedEmail()) {
           
            return redirect('/verify-email'); 
        }

        return $next($request);
    }
}
