<?php

namespace App\Exceptions;

class ContainerFullException extends \Exception
{
    public function __construct(float $remainingSpace, float $requiredSpace)
    {
        parent::__construct(
            sprintf(
                'Container is full. Remaining space: %.2f liters, Required space: %.2f liters',
                $remainingSpace,
                $requiredSpace
            )
        );
    }
}