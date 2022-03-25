<?php

namespace App\Lib\Traits;

use Illuminate\Support\Str;

trait HasStatus
{

    public function checkStatus(string $status)
    {
        $status = Str::slug( $status, '_');

        if ( $this->status === $status){
            return true;
        }

        return false;
    }


}
