<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectIfNotFinance
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
        foreach (Auth::user()->role as $role) {
            if($role->name == "finance") {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
