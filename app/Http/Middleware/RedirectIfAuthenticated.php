<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    foreach(Role::all() as $rl) {
                        if(session('whoIsLoggedIn') == $rl->name) {
                            return redirect($rl->redirect);
                        }
                    }
                }
                break;
            
            default:
                if (Auth::guard($guard)->check())
                    {
                        return redirect('/home');
                    }
                break;
        }
        return $next($request);
    }
}
