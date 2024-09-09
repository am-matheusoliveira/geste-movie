<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfPublicInUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se a URL contém '/public'
        if (strpos($request->getRequestUri(), '/public') !== false && $request->getRequestUri() !== '/') {

            // Obtem o esquema (http ou https)
            $scheme = $request->getScheme();

            // Obtem o host (localhost ou o domínio)
            $host = $request->getHttpHost();

            // Obtem a URI atual
            $uri = $request->getRequestUri();

            // Remove '/public' do caminho se estiver presente
            $uri = str_replace('/public', '', $uri);

            // Constroi a URL base
            $baseUrl = $scheme . '://' . $host . $uri;

            // Redireciona para a raiz do site
            return redirect($baseUrl);
            
        }

        return $next($request);
    }
}
