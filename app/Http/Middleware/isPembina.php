<?php

namespace App\Http\Middleware;

use Closure;

class isPembina
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
        if(auth()->user()->isPembina()){
            return $next($request);
        }
        
        return redirect('beranda/index');
    }
}
