<?php

namespace App\Http\Middleware;

use Closure;

class isFprakom
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
        if(auth()->user()->isFprakom()){
            return $next($request);
        }
        
        return redirect('beranda/index');
    }
}
