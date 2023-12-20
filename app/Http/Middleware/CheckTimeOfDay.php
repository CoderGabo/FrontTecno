<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeOfDay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        date_default_timezone_set('America/La_Paz');
        $horaActual = (int) date('H');
        $esDeNoche = $horaActual >= 18 || $horaActual < 6;

        // Establece el valor en la sesión
        session(['es_de_noche' => $esDeNoche]);

        return $next($request);
    }
}
