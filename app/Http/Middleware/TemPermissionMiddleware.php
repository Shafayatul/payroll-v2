<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class TemPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /* return $user->hasPermissionTo($permission); */
    public function handle($request, Closure $next, $permission = null){
        if($permission !== null && !$request->user()->hasPermissionTo($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
