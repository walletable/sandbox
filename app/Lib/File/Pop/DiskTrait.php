<?php

namespace App\Lib\File\Pop;

/**
 * Indentity Disk Trait
 */
trait DiskTrait
{

    protected static function storeTo()
    {
        return config('site.files.pop.path');
    }

    protected static function storeToDisk()
    {
        return config('site.files.pop.disk');
    }
    
}
