<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard = null)
    {
        if (! $request->expectsJson()) {
            switch ($guard) {

                case 'admin':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('admin.home');
                    }
                default:
                    if (Auth::guard($guard)->check()) {
                        return redirect('/');
                    }
                    break;
            }
            /* return $next($request); */
        }
    }
}
