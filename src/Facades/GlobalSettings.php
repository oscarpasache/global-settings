<?php

namespace OscarPasache\GlobalSettings\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OscarPasache\GlobalSettings\GlobalSettings
 */
class GlobalSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \OscarPasache\GlobalSettings\GlobalSettings::class;
    }
}
