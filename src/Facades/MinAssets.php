<?php

namespace DenisKisel\MinAssets\Facades;

use Illuminate\Support\Facades\Facade;

class MinAssets extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'minassets';
    }
}
