<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DisableAdmin
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

        if (!Auth::check()) {
            return redirect('/');
        }
        
        if (Auth::user()->usertype != "3") {
            return redirect('/');
        }

        return $next($request);
    }
}
