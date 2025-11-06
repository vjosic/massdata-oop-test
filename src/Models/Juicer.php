<?php

namespace App\Models;

use App\Interfaces\JuicerInterface;
use App\Interfaces\SqueezeableInterface;
use App\Exceptions\JuiceContainerFullException;

class Juicer implements JuicerInterface
{
    private FruitContainer $container;
    private Strainer $strainer;
    private float $juiceCapacity;
    private float $currentJuiceVolume = 0;

    public function __construct(array $config)
    {
        $this->juiceCapacity = $$config['juice_capacity'] ?? 20.0;
        $this->container = new FruitContainer($config['container_capacity'] ?? 10.0);
        $this->strainer = new Strainer();
    }

    public function squeeze(): float
    {
        $juiceVolume = $this->strainer->squeeze($this->container);
        // Check if we have enough capacity for the juice; if not, abort squeezing
        $availableCapacity = $this->juiceCapacity - $this->currentJuiceVolume;
        if ($availableCapacity < $juiceVolume) {
            // Throwing exception to indicate juice tank cannot accept the produced juice
            throw new JuiceContainerFullException($availableCapacity, $juiceVolume);
        }

        $this->currentJuiceVolume += $juiceVolume;
        echo sprintf("Squeezed %.2f liters of juice. Total juice: %.2f/%.2f liters\n", 
            $juiceVolume,
            $this->currentJuiceVolume,
            $this->juiceCapacity
        );

        return $juiceVolume;
    }

    public function addItem(SqueezeableInterface $item): void
    {
        $this->container->addItem($item);
        echo sprintf(
            "Added fruit of volume %.2f volume. Container has %.2f volume remaining capacity\n",
            $item->getVolume(),
            $this->container->getRemainingCapacity()
        );
    }

    public function getTotalJuice(): float
    {
        return $this->strainer->getTotalJuiceProduced();
    }
}