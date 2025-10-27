<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, $rol)
    {
        // Verifica si existe el rol en la sesión
        if (!$request->session()->has('rol')) {
            return redirect('/login'); // o cualquier ruta que quieras
        }

        // Verifica si coincide con el rol requerido
        if ($request->session()->get('rol') !== $rol) {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
