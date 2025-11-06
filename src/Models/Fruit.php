<?php

namespace App\Models;

use App\Interfaces\SqueezeableInterface;

abstract class Fruit implements SqueezeableInterface
{
    protected const UNIT_TO_LITERS = 1.0; // 1 unit = 1 litre

    public function __construct(
        protected string $color,
        protected float $volume
    ) {}

    public function getColor(): string
    {
        return $this->color;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getJuiceAmount(): float
    {
         return $this->getVolumeInLiters() * 0.5; // 50% of fruit volume becomes juice
    }

    public function getVolumeInLiters(): float 
    {
        return $this->volume * self::UNIT_TO_LITERS;
    }
}