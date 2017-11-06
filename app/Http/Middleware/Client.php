<?php

namespace App\Http\Middleware;

use Closure;

class Client
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
//        return auth()->user()->type;
        if(auth()->user()->type==0){
            abort(403);
        }
        return $next($request);
    }
}
