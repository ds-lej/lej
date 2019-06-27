<?php

namespace Lej\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Lej\Support\Traits\JsonTypeRedirect;

class RedirectIfAuthenticated
{
    use JsonTypeRedirect;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
            return $request->ajax() ? $this->resultRedirect('/') : redirect('/');

        return $next($request);
    }
}
