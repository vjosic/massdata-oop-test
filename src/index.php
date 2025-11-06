<?php

require_once __DIR__ . '/autoload.php';

use App\Models\Juicer;
use App\Exceptions\ContainerFullException;
use App\Exceptions\RottenFruitException;
use App\Exceptions\JuiceContainerFullException;
use App\Factories\FruitFactory;


$config = [
    'juice_capacity' => 20,// in liters
    'container_capacity' => 8, // in volume units
    'prefilled' => 2, // number of items to prefill
];



// Initialize juicer 
$juicer = new Juicer($config);


// Prefill the fruit container with some apples (they can be rotten)
echo "Prefilling fruit container with apples...\n";
// Try to add up to 20 apples or until the container is full
for ($j = 0; $j < $config['prefilled'] ?? 0; $j++) {
    
    $apple = FruitFactory::pickAnApple();
    echo "Picked a {$apple->getColor()} apple ({$apple->getVolume()} volume) - " .
    ($apple->isRotten() ? "rotten" : "fresh") . PHP_EOL;

    try {
        $juicer->addItem($apple);
        echo "Prefilled an apple\n";
    } catch (RottenFruitException $e) {
        echo "Skipped a rotten apple while prefilling.\n";
        continue;
    } catch (ContainerFullException $e) {
        echo "Container became full while prefilling.\n";
        break;
    }
}


// Counter for squeeze operations
$squeezeCount = 0;

// Run 100 consecutive actions
for ($i = 1; $i <= 100; $i++) {
    echo "\nAction #$i:\n";
    
    // Every 9th squeeze, add an apple
    if ($squeezeCount > 0 && $squeezeCount % 9 === 0) {
          
        $apple = FruitFactory::pickAnApple();
        echo "Picked a {$apple->getColor()} apple ({$apple->getVolume()} volume) - " .
        ($apple->isRotten() ? "rotten" : "fresh") . PHP_EOL;
        
        try {
            $juicer->addItem($apple);
            echo "Added an apple\n";
        } catch (RottenFruitException $e) {
            echo "Skipped adding a rotten apple.\n";
        } catch (ContainerFullException $e) {
            echo "Container is full! Continue with squeezing ...\n";
         }
    }

    // Perform squeeze operation
    try {
        $juicer->squeeze();
    } catch (JuiceContainerFullException $e) {
        echo "Cannot squeeze because juice container is full: " . $e->getMessage() . "\n";
        echo "Stopping simulation early.\n";
        break;
    }
    $squeezeCount++;
}

echo "\nSimulation complete!\n";
echo sprintf("Total juice produced: %.2f liters\n", $juicer->getTotalJuice());