<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if(Auth::check() && Auth::user()->level == '1'){
            return $next($request);
        }elseif( Auth::check() && Auth::user()->level == '0' )
        {
            return redirect('/user');
        }else
        {
            return redirect('/');
        }
    }
}
