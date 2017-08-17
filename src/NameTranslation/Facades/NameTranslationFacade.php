<?php

namespace NameTranslation\Facades;

use Illuminate\Support\Facades\Facade;

class NameTranslationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'name-translation';
    }
}
