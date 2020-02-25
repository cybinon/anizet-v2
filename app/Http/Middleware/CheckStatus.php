<?php

namespace App\Http\Middleware;

use Closure;

class CheckStatus
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
         $response = $next($request);
        //If the status is not approved redirect to login
        if(\Auth::user()->status != 1){
            return redirect('/');
        }
        return $response;
    }
}
