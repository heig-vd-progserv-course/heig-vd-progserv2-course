<?php
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/utils/simulate-growth-season.php';

use Flowers\Rose;
use Herbs\Herb;
use Herbs\Basil;
use Herbs\Rosemary;

// Démonstration
echo "<h1>Exemple : Namespaces avec autoloader</h1>";

// Création d'instances de différents niveaux de la hiérarchie
$rose = new Rose("Rose", "Rosa", 30.0);
$herb = new Herb("Thyme", "Thymus vulgaris", 15.0);
$basil = new Basil("Purple Ruffles", 10.0);
$rosemary = new Rosemary(25.0);

// Configuration des herbes
$herb->addCulinaryUse("Assaisonnement");
$herb->addCulinaryUse("Tisanes");

// Affichage des informations initiales
echo "<h2>Plantes du jardin</h2>";
$plants = [$rose, $herb, $basil, $rosemary];

foreach ($plants as $plant) {
    echo $plant->getDescription() . "<br>";
    echo "Entretien: " . $plant->getCareInstructions() . "<br>";

    if ($plant instanceof Herb) {
        echo "Utilisations culinaires: " . implode(", ", $plant->getCulinaryUses()) . "<br>";
        echo "Type: " . ($plant->isPerennial() ? "Vivace" : "Annuelle") . "<br>";
    }
    echo "<br>";
}

// Test de la compatibilité climatique
echo "<h2>Test de compatibilité climatique</h2>";
$climates = ['tempéré', 'méditerranéen', 'tropical', 'continental'];

foreach ($climates as $climate) {
    echo "Climat {$climate}:<br>";
    foreach ($plants as $plant) {
        $compatible = $plant->canBeGrown($climate) ? "✓" : "✗";
        echo " {$compatible} {$plant->getEnglishName()}<br>";
    }
    echo "<br>";
}

// Simulation de croissance
simulateGrowthSeason($plants);
