<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class SuperAdminCheck
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
        if ( Auth::user()->id_role == 1) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
