<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\RoleBase as Middleware;
use Illuminate\Support\Facades\Auth;
class RoleBase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

#2nd Method
    public function handle($request, Closure $next, String $role) {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
        return redirect('/no_dashboard');

        #if ( Auth::check() && Auth::user()->isAdmin() )
        #{
        #    return $next($request);
        #}
        #return redirect('/admin_dashboard');


        if(Auth::user()->role == $role)
        {
            return $next($request);
        }
        return redirect('/user_dashboard');
    }
}
