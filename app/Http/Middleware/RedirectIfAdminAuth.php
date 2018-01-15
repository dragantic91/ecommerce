<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/20/2017
 * Time: 12:35 PM
 */

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectIfAdminAuth
{
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check()) {

            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}