<?php

namespace App\Exceptions;

class RottenFruitException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Cannot process rotten fruit');
    }
}