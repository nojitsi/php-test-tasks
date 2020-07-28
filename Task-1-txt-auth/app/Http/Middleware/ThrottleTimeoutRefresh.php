<?php

namespace App\Http\Middleware;

use App\Http\Middleware\ThrottleLoginRequest;
use Closure;

class ThrottleTimeoutRefresh
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
        $rateLimitExpirationDate = $request->session()->get('X-RateLimit-Expiration-Date');
        $now = now();
        if ($rateLimitExpirationDate < $now) {
            if ($request->session()->has('X-RateLimit-Expiration-Date')) {
                $request->session()->put('X-RateLimit-Remaining', ThrottleLoginRequest::MAX_LOGIN_ATTEMPTS);
            }
            return $next($request);
        }
        return redirect('/')->withErrors('Retry after '.$now->diffInMinutes($rateLimitExpirationDate).' minutes');
    }
}
