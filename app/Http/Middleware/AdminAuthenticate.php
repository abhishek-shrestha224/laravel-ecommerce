<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdminAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Redirect to the admin login page if the request is not expecting JSON
        return $request->expectsJson() ? null : route('admin.login');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Check if the user is authenticated with the admin guard
        if ($this->auth->guard('admin')->check()) {
            // If authenticated, set the guard to admin
            $this->auth->shouldUse('admin');
            return $next($request);
        }

        // If not authenticated, redirect to the admin login page
        return $this->unauthenticated($request, $guards);
    }
}
