<?php
require_once __DIR__ . '/Plant.php';

// Classe fille - Plante aromatique
class Herb extends Plant {
    protected array $culinaryUses;
    protected string $harvestSeason;
    protected bool $isPerennial;

    public function __construct(string $englishName, string $latinName, float $heightInCm = 0.0, bool $isPerennial = true) {
        // Appel du constructeur parent
        parent::__construct($englishName, $latinName, $heightInCm);

        // Propriétés spécifiques aux herbes aromatiques
        $this->culinaryUses = [];
        $this->harvestSeason = "Été";
        $this->isPerennial = $isPerennial;

        // Modification des paramètres hérités pour les herbes
        $this->soilType = "Bien drainé";
        $this->wateringFrequency = 3; // Plus fréquent
    }

    // Getters spécifiques
    public function getCulinaryUses(): array {
        return $this->culinaryUses;
    }

    public function getHarvestSeason(): string {
        return $this->harvestSeason;
    }

    public function isPerennial(): bool {
        return $this->isPerennial;
    }

    // Setters spécifiques
    public function addCulinaryUse(string $use): void {
        if (!in_array($use, $this->culinaryUses)) {
            $this->culinaryUses[] = $use;
        }
    }

    public function setHarvestSeason(string $season): void {
        $this->harvestSeason = $season;
    }

    // Redéfinition de méthodes (override)
    public function getDescription(): string {
        $baseDescription = parent::getDescription();
        $type = $this->isPerennial ? "vivace" : "annuelle";
        return $baseDescription . ", Herbe aromatique {$type}";
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Pincer les fleurs pour favoriser la croissance des feuilles.";
    }

    // Méthodes spécifiques aux herbes
    public function harvest(): string {
        if (empty($this->culinaryUses)) {
            return "Récolte de {$this->englishName} effectuée.";
        }

        $uses = implode(", ", $this->culinaryUses);
        return "Récolte de {$this->englishName} effectuée. Utilisations: {$uses}.";
    }

    public function canBeGrown(string $climate): bool {
        // Les herbes sont plus adaptables
        return in_array($climate, ['tempéré', 'méditerranéen', 'continental', 'subtropical']);
    }
}
