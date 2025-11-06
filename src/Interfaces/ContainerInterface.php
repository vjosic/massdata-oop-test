<?php

namespace App\Interfaces;

interface ContainerInterface
{
    /**
     * Add a squeezeable item to the container
     */
    public function addItem(SqueezeableInterface $item): void;

    /**
     * Get the number of items in the container
     */
    public function getItemCount(): int;

    /**
     * Get remaining capacity in the container
     */
    public function getRemainingCapacity(): float;

    /**
     * Get all items from the container
     * @return SqueezeableInterface[]
     */
    public function getAllItems(): array;

    /**
     * Clear all items from the container
     */
    public function clear(): void;
}