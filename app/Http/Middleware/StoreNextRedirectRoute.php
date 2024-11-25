<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreNextRedirectRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $customRoute = null)
    {
        if ($customRoute) {
            // Se um parâmetro de rota for passado, armazene-o
            session()->put('next_redirect_route', $customRoute);
            session()->put('next_redirect_url', route($customRoute));
        } else {
            // Caso contrário, armazena a rota atual
            if ($request->route()) {
                // Nome da rota
                session()->put('next_redirect_route', $request->route()->getName());
                
                // URL completa
                session()->put('next_redirect_url', $request->fullUrl());
            }
        }

        return $next($request);
    }
}
