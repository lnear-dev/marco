<?php

namespace Lame\Marco\Color;

class UnknownShadeException extends \Exception
{
    public function __construct($color)
    {
        parent::__construct("Unknown Shade: $color");
    }
}
