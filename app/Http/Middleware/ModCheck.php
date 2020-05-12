<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ModCheck
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
        if ( Auth::user()->id_role < 3) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
