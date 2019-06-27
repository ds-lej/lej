<?php

namespace Lej\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Lej\Support\Traits\JsonTypeResults;
use Lej\Support\Traits\JsonTypeRedirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, JsonTypeResults, JsonTypeRedirect;
}
