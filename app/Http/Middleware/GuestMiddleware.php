<?php

namespace App\Http\Middleware;

use Closure;

class GuestMiddleware
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
        if( Auth::check() && Auth::user()->level == '1')
        {
            dd('tttttt');
            return redirect()->route('view_hidden_matches');
        }elseif(Auth::check() && Auth::user()->level == '0')
        {
            dd('ttttttt');
            return redirect()->route('user_bet');
        }else
        {
            return $next($request);
        }
    }
}
