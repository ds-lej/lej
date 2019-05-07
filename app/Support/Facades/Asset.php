<?php

namespace Ds\Support\Facades;

use Ds\Support\Asset as AssetClass;
use Illuminate\Support\Facades\Facade;

class Asset extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return AssetClass::class;
    }
}