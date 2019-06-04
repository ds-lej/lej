<?php

namespace Lej\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    protected $proxies = [
        //
    ];

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;

    /**
     * Add trusted proxy
     *
     * @param string $proxy
     * @return $this
     */
    public function addTrustedProxy($proxy)
    {
        if (array_search($proxy, $this->proxies) === false)
            $this->proxies[] = $proxy;

        return $this;
    }
}
