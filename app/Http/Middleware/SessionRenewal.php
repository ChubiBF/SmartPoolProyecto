<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionRenewal
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
        if (Auth::check() && $this->shouldRenewSession($request)) {
            $request->session()->regenerate();
        }
        return $next($request);
    }

    /**
     * Determine if the session should be renewed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldRenewSession($request)
    {
        return !$request->ajax() && 
               rand(1, 100) <= 10; // 10% de probabilidad de renovar la sesión
    }
}