<?php

namespace Zezont4\ACL\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if (!app('Illuminate\Contracts\Auth\Guard')->guest()) {
            if ($request->user()->may($permission)) {
                return $next($request);
            }
        }

//        return $request->ajax ? response('Unauthorized.', 401) : redirect('/login');
        return response('Unauthorized.', 401);
    }
}