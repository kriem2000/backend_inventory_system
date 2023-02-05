<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // abort_if(!auth()->check(), 422, 'Unauthenticated');
        
        // if (!auth()->user()->hasRole('Admin')) {
        //     abort(422);
        // }

        return $next($request);
    }
}
