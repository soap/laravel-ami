<?php

namespace Soap\Ami;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Soap\Ami\Ami
 */
class AmiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-ami';
    }
}
