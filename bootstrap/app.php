<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckRole::class,
            'session.renewal' => \App\Http\Middleware\SessionRenewal::class, // Agregar esta línea
            'two-factor' => \App\Http\Middleware\TwoFactorMiddleware::class,
        ]);
        
        // Agregar el middleware al grupo web
        $middleware->web(append: [
            \App\Http\Middleware\SessionRenewal::class,
            \App\Http\Middleware\TwoFactorMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();