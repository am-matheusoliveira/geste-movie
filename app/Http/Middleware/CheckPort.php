<?php

namespace App\Http\Middleware;

use Closure;

class CheckPort
{
    public function handle($request, Closure $next)
    {
        // Obtém a porta da requisição
        $port = $request->getPort();

        // Define o caminho para os assets dependendo da porta
        if ($port == 8000) { // Se for a porta 8000 (ex. php artisan serve)

            config(['app.asset_path' => '']);

        } else { // Para outras portas (ex. Apache/Nginx em produção)
            
            config(['app.asset_path' => (asset('').'public')]);

        }

        return $next($request);
    }
}
