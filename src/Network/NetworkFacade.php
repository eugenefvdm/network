<?php

namespace Eugenevdm\Network;

use Illuminate\Support\Facades\Facade;

class NetworkFacade extends Facade
{
    /**
     * The name of the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Network';
    }
}
