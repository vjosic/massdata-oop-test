<?php

namespace App\Exceptions;

class JuiceContainerFullException extends \Exception
{
    public function __construct(float $availableCapacity, float $required)
    {
        parent::__construct(sprintf(
            'Juice container is full or does not have enough space. Available: %.2f liters, Required: %.2f liters',
            $availableCapacity,
            $required
        ));
    }
}
