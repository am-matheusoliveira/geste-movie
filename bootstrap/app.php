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
        $middleware->append([
            'redirect.public' => \App\Http\Middleware\RedirectIfPublicInUrl::class,
            'CheckPort' => \App\Http\Middleware\CheckPort::class,
        ]);
        
        $middleware->alias([            
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'store.next.redirect' => \App\Http\Middleware\StoreNextRedirectRoute::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
