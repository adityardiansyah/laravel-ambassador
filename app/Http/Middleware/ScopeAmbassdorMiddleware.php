<?php

namespace App\Http\Middleware;

use Closure;

class ScopeAmbassdorMiddleware
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
        if(!$request->user()->tokenCan('ambassador')){
            abort(401, 'unautorized');
        }
        
        return $next($request);
    }
}
