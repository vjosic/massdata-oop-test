<?php

namespace App\Models;

use App\Exceptions\ContainerFullException;
use App\Exceptions\RottenFruitException;
use App\Interfaces\ContainerInterface;
use App\Interfaces\SqueezeableInterface;

class FruitContainer implements ContainerInterface
{
    /** @var SqueezeableInterface[] */
    private array $items = [];
    private float $capacity;
    private float $usedCapacity = 0;

    public function __construct(float $capacity)
    {
        $this->capacity = $capacity;
    }

    public function addItem(SqueezeableInterface $item): void
    {
        // Prevent adding rotten apples into the container
        if ($item instanceof Apple && method_exists($item, 'isRotten') && $item->isRotten()) {
            throw new RottenFruitException();
        }

        if ($this->getRemainingCapacity() < $item->getVolume()) {
            throw new ContainerFullException($this->getRemainingCapacity(), $item->getVolume());
        }

        $this->items[] = $item;
        $this->usedCapacity += $item->getVolume();
    }

    public function getItemCount(): int
    {
        return count($this->items);
    }

    public function getRemainingCapacity(): float
    {
        return $this->capacity - $this->usedCapacity;
    }

    public function getAllItems(): array
    {
        return $this->items;
    }

    public function clear(): void
    {
        $this->items = [];
        $this->usedCapacity = 0;
    }
}