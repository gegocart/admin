<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
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
       
        if (auth()->check() && auth()->user()->usergroup_id == 1)
        {
        
           return $next($request);
        }    
        return redirect('/');
    }
}
