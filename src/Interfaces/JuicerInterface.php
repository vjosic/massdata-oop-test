<?php

namespace App\Interfaces;

interface JuicerInterface
{
    /**
     * Squeeze fruits in the container and return juice volume
     */
    public function squeeze(): float;

    /**
     * Add a squeezeable item to the juicer's container
     */
    public function addItem(SqueezeableInterface $item): void;

    /**
     * Get total juice produced
     */
    public function getTotalJuice(): float;
}