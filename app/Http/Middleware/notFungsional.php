<?php

namespace App\Http\Middleware;

use Closure;

class notFungsional
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
        if(auth()->user()->notFungsional()){
            return $next($request);
        }
        
        return redirect('beranda/index');
    }
}
