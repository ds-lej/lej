<?php

namespace Lej\Http\Middleware;

use Closure;
use Lej\Exceptions\ExtRequestException;

class ExtRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Lej\Exceptions\ExtRequestException
     */
    public function handle($request, Closure $next)
    {
        if (! $request->ajax() || ! $request->header('EXT-AJAX'))
            throw new ExtRequestException('Ext request error!');

        return $next($request);
    }
}
