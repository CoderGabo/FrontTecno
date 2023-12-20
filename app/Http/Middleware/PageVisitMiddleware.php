<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class PageVisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtén la ruta de la página actual
        $route = $request->route()->getName();

        // Incrementa el contador de visitas para la página específica
        Cache::increment("page_visits:$route");

        // Recupera el contador almacenado en Cache
        $pageVisits = Cache::get("page_visits:$route", 0);

        // Almacena el contador en una variable de sesión para que sea accesible en las vistas
        session(['page_visits' => $pageVisits]);

        return $next($request);
    }
}
