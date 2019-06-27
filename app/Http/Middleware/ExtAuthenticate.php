<?php

namespace Lej\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

use Lej\Support\Traits\AddExceptsForMiddleware;
use Lej\Support\Traits\JsonTypeRedirect;

class ExtAuthenticate
{
    use AddExceptsForMiddleware, JsonTypeRedirect;

    /**
     * The URIs that should be excluded from authentication.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
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
        if (! $this->inExceptArray($request) && ! $this->authenticate($guards))
            return $this->resultRedirect('/login');

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function inExceptArray($request)
    {
        foreach ($this->except as $except)
        {
            if ($except !== '/')
                $except = trim($except, '/');

            if (substr($except, 0, 4) !== 'ext/')
                $except = 'ext/'.$except;

            if ($request->fullUrlIs($except) || $request->is($except))
                return true;
        }

        return false;
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  array  $guards
     * @return bool
     */
    protected function authenticate(array $guards)
    {
        if (empty($guards))
            $guards = [null];

        foreach ($guards as $guard)
        {
            if ($this->auth->guard($guard)->check())
            {
                $this->auth->shouldUse($guard);
                return true;
            }
        }

        return false;
    }
}
