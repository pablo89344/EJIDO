<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $type)
    {
        // Verificar si el usuario está autenticado y tiene el tipo incorrecto
        if (Auth::guard('usuarios')->check() && Auth::guard('usuarios')->user()->user_tipo != $type) {
            // Redirigir si el tipo no es el esperado
            return redirect('/libros/crear');
        }

        return $next($request);
    }
}
