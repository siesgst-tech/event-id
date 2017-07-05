<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class SessionAuth
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
        if(!Session::has('session')) {
            return Redirect::to('/auth/login')->with('error', 'Please login to continue');
        }
        $request->merge(array(Session::get('session')));
        return $next($request);
    }
}
