<?php

namespace App\Http\Middleware;

use Closure;

class ThrottleLoginRequest
{
    const MAX_LOGIN_ATTEMPTS = 3;
    const LOGIN_TIMEOUT = 60 * 5;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ($request->session()->exists('username')) {
            $request->session()->put('X-RateLimit-Remaining', self::MAX_LOGIN_ATTEMPTS);
        }
        else {
            $remainingLoginAttempts = $request->session()->get('X-RateLimit-Remaining') ?? self::MAX_LOGIN_ATTEMPTS;
            if ($remainingLoginAttempts === 1) {
                $request->session()->put('X-RateLimit-Expiration-Date', now()->addSeconds(self::LOGIN_TIMEOUT));
                return redirect('/')->withErrors('Retry after 5 minutes');
            }
            else {
                $request->session()->put('X-RateLimit-Remaining', $remainingLoginAttempts - 1);
            }
        }

        return $response;
    }
}
