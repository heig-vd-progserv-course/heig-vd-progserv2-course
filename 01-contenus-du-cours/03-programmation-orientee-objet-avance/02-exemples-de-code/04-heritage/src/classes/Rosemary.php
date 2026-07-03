<?php
require_once __DIR__ . '/Herb.php';

// Classe fille spécialisée - Romarin
class Rosemary extends Herb {
    private bool $isFlowering;
    private string $hardiness; // Résistance au froid

    public function __construct(float $height = 0.0) {
        parent::__construct("Rosemary", "Rosmarinus officinalis", $height, true); // Vivace

        $this->isFlowering = false;
        $this->hardiness = "Rustique";

        // Configuration spécifique au romarin
        $this->addCulinaryUse("Viandes grillées");
        $this->addCulinaryUse("Pommes de terre rôties");
        $this->addCulinaryUse("Pain");
        $this->setHarvestSeason("Toute l'année");
        $this->wateringFrequency = 10; // Résistant à la sécheresse
        $this->soilType = "Sec et calcaire";
    }

    public function isFlowering(): bool {
        return $this->isFlowering;
    }

    public function getHardiness(): string {
        return $this->hardiness;
    }

    public function bloom(): string {
        if (!$this->isFlowering && $this->heightInCm > 20) {
            $this->isFlowering = true;
            return "Le romarin produit de belles fleurs bleues!";
        } elseif ($this->heightInCm <= 20) {
            return "Le romarin est encore trop jeune pour fleurir.";
        }
        return "Le romarin est déjà en fleurs.";
    }

    public function canBeGrown(string $climate): bool {
        // Le romarin est très résistant
        return true; // Peut pousser partout avec les soins appropriés
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Résiste bien au froid et à la sécheresse. Tailler après floraison.";
    }
}
