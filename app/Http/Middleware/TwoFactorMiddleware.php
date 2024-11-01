<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Lista de rutas que deberían omitir la verificación de dos factores
        $excludedRoutes = [
            'logout',
            'two-factor.show',
            'two-factor.verify',
            'two-factor.resend'
        ];

        // Si es una ruta excluida, permitir el acceso
        if (in_array($request->route()->getName(), $excludedRoutes)) {
            return $next($request);
        }

        // Si el usuario tiene 2FA activado y no ha completado la verificación
        if ($user && 
            $user->two_factor_enabled && 
            !session()->has('two_factor_verified'))
        {
            return redirect()->route('two-factor.show');
        }

        return $next($request);
    }
}