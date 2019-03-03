<?php

namespace App\Http\Middleware;

use Closure;

class isFstatistisi
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
        if(auth()->user()->isFstatistisi()){
            return $next($request);
        }
        
        return redirect('beranda/index');
    }
}
