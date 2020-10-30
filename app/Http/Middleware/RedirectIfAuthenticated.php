<?php

namespace App\Http\Middleware;

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
                if (Auth::guard($guard)->check())
                    {
                        
                        if(session('whoIsLoggedIn')=='admin') {
                            return redirect('admin/home');
                        }elseif(session('whoIsLoggedIn') == 'finance') {
                            return redirect('admin/dashboard');
                        }elseif(session('whoIsLoggedIn') == 'instructor') {
                            return redirect('admin');
                        }else{
                            return redirect('/');
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
