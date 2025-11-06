<?php

namespace App\Models;

use App\Exceptions\RottenFruitException;
use App\Interfaces\ContainerInterface;
use App\Interfaces\SqueezeableInterface;

class Strainer
{
    private float $totalJuiceProduced = 0;

    public function squeeze(ContainerInterface $container): float
    {
        $juiceAmount = 0;
        
        foreach ($container->getAllItems() as $item) {
            try {
                $juiceAmount += $item->getJuiceAmount();
            } catch (RottenFruitException $e) {
                echo "Skipping rotten fruit...\n";
            }
        }

        $this->totalJuiceProduced += $juiceAmount;
        $container->clear();

        return $juiceAmount;
    }

    public function getTotalJuiceProduced(): float
    {
        return $this->totalJuiceProduced;
    }
}