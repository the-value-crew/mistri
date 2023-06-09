<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VendorMiddleware
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
        if(Auth::check()){
            if(Auth::user()->user_type == 1)
            {
                return $next($request);
            }
            return redirect()->route('home-page')->with('failure', 'Access Denied.');
        }

        return redirect()->route('home-page')->with('failure', 'Access Denied.');
    }

}
