<?php

namespace App\Lib\Props;
use Money\Money as BaseMoney;

class Money extends BaseMoney
{
    
    public function __toString()
    {
        return $this->getAmount();
    }
}
