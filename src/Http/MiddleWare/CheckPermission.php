<?php

namespace Zezont4\ACL\Http\Middleware;

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
//		var_dump($request->all());
//		var_dump($next);
//		dd($permission);

        if (auth()->check()) {
            if ($request->user()->allowedTo($permission)) {
                return $next($request);
            }
        }

//        return $request->ajax ? response('Unauthorized.', 401) : redirect('/login');
        return response('Unauthorized.', 401);
    }
}