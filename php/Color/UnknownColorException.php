<?php

namespace Lame\Marco\Color;

class UnknownColorException extends \Exception
{
    public function __construct($color)
    {
        parent::__construct("Unknown Color: $color");
    }
}
