<?php

namespace App\Factories;

use App\Models\Apple;

/**
 * Factory class for creating random fruits.
 */
class FruitFactory
{
    public static function pickAnApple(): Apple
    {
        $volume = rand(10, 50) / 10; // 1.0–5.0 litara
        $colors = ['red', 'green', 'yellow'];
        $color = $colors[array_rand($colors)];
        $isRotten = (rand(1, 100) <= 20);

        return new Apple($color, $volume, $isRotten);
    }
}
