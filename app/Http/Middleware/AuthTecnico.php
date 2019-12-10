<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class AuthTecnico
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

        if(auth()->user()->is_adm) {
            return $next($request);
        }
        $pessoa = DB::table('pessoas')->where('usuario_id', auth()->user()->id)->first();          
        if($pessoa->is_funcionario){  
            $funcionario = DB::table('funcionarios')->where('pessoa_id', $pessoa->id)->first();
            if($funcionario->is_gestor or $funcionario->is_tecnico){
                return $next($request);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
