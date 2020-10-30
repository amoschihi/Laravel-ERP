<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfLocked
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

        if(session('whoIsLoggedIn')==''){
            $url = url('admin/login'); 
            return redirect($url)->with('message','You are not logged in');
        }
        if(session('locked')==1){
            $url = url('admin/lockscreen');
            return redirect($url);
        }
        return $next($request);
    }
}
