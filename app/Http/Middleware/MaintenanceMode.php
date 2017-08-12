<?php

namespace App\Http\Middleware;

use Closure;




class MaintenanceMode
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

        if(\Auth::check() && $request->user()->role == 'admin'){
            return $next( $request );
        }

        return response('');
    }
}
