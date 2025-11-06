<?php

namespace App\Interfaces;

interface SqueezeableInterface
{

    
    /**
     * Get the volume of juice that can be extracted from the squeezeable item
     */
    public function getJuiceAmount(): float;

    /**
     * Get the total volume of the squeezeable item
     */
    public function getVolume(): float;
}