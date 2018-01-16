<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/19/2017
 * Time: 1:44 AM
 */

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect; // Remove in production!!!
use Illuminate\Support\Facades\Auth;
use Closure;

class FrontAuth
{
    public function handle($request, Closure $next, $guard = "web")
    {
        if (Auth::guard($guard)->guest()){
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }
            else {
                return Redirect::away('http://spotter.ch/schoengebraucht'); // Remove in production!!!
                //return redirect()->guest('/login');
            }
        }

        return $next($request);
    }
}