<?php

namespace Flowers;

require_once __DIR__ . '/../../utils/autoloader.php';

// Classe fille - Rose
class Rose extends Flower {
    public function __construct(string $englishName, string $latinName, float $heightInCm = 0.0, bool $hasThorns = true) {
        // Appel du constructeur parent
        parent::__construct($englishName, $latinName, $heightInCm, $hasThorns);
    }
}
