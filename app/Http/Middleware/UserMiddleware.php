<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
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
        if( Auth::check() && Auth::user()->level == '0')
        {
            return $next($request);
        }elseif(Auth::check() && Auth::user()->level == '1')
        {
            return redirect()->route('view_hidden_matches');
        }else
        {
            return redirect('/');
        }
    }
}
