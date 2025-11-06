<?php

namespace App\Models;

use App\Exceptions\RottenFruitException;

class Apple extends Fruit
{
    private bool $isRotten;

    public function __construct(string $color, float $volume, bool $isRotten = false)
    {
        parent::__construct($color, $volume);
        $this->isRotten = $isRotten;
    }

    public function isRotten(): bool
    {
        return $this->isRotten;
    }

    public function getJuiceAmount(): float
    {
        if ($this->isRotten) {
            throw new RottenFruitException();
        }
        
        return parent::getJuiceAmount();
    }
}