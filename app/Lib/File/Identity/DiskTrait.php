<?php

namespace App\Lib\File\Identity;

/**
 * Indentity Disk Trait
 */
trait DiskTrait
{

    protected static function storeTo()
    {
        return config('site.files.identity.path');
    }

    protected static function storeToDisk()
    {
        return config('site.files.identity.disk');
    }
    
}
