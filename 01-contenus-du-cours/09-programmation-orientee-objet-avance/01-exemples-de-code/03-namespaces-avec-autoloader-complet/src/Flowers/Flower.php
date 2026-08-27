<?php

namespace Flowers;

require_once __DIR__ . '/../../utils/autoloader.php';

// Importation de la classe parent d'un différent namespace
use Plants\Plant;

// Classe fille - Plante à fleurs
class Flower extends Plant {
    protected bool $hasThorns;

    public function __construct(string $englishName, string $latinName, float $heightInCm = 0.0, bool $hasThorns = false) {
        // Appel du constructeur parent
        parent::__construct($englishName, $latinName, $heightInCm);

        // Propriétés spécifiques aux fleurs
        $this->hasThorns = $hasThorns;

        // Modification des paramètres hérités pour les fleurs
        $this->soilType = "Acide à neutre";
        $this->wateringFrequency = 4; // Arrosage modéré
    }

    // Getters spécifiques
    public function hasThorns(): bool {
        return $this->hasThorns;
    }

    // Setters spécifiques
    public function setHasThorns(bool $hasThorns): void {
        $this->hasThorns = $hasThorns;
    }

    // Redéfinition de méthodes (override)
    public function getDescription(): string {
        $baseDescription = parent::getDescription();
        $type = $this->hasThorns ? "avec épines" : "sans épines";
        return $baseDescription . ", Fleur {$type}";
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Tailler régulièrement pour favoriser la floraison.";
    }

    // Méthodes spécifiques aux fleurs
    public function canBeGrown(string $climate): bool {
        // Les fleurs sont plus exigeantes
        return in_array($climate, ['tempéré', 'méditerranéen']);
    }
}
