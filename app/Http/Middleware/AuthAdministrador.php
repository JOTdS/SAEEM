<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica se está logado, se não tiver redireciona
        if ( !auth()->check() ) return redirect()->route('login');

        if(!auth()->user()->is_adm) return redirect()->back();        
        return $next($request);
    }
}
