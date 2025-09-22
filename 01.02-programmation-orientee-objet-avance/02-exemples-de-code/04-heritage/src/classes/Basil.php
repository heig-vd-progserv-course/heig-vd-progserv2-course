<?php
require_once __DIR__ . '/Herb.php';

// Classe fille spécialisée - Basilic
class Basil extends Herb {
    private string $variety;
    private int $leafSize; // en mm

    public function __construct(string $variety = "Genovese", float $heightInCm = 0.0) {
        // Appel du constructeur parent avec des valeurs spécifiques
        parent::__construct("Basil", "Ocimum basilicum", $heightInCm, false); // Annuel

        $this->variety = $variety;
        $this->leafSize = 25; // Taille moyenne

        // Configuration spécifique au basilic
        $this->addCulinaryUse("Cuisine italienne");
        $this->addCulinaryUse("Pesto");
        $this->addCulinaryUse("Salades");
        $this->setHarvestSeason("Été à automne");
        $this->wateringFrequency = 2; // Très fréquent
    }

    public function getVariety(): string {
        return $this->variety;
    }

    public function getLeafSize(): int {
        return $this->leafSize;
    }

    // Redéfinition spécifique au basilic
    public function getDescription(): string {
        $baseDescription = parent::getDescription();
        return $baseDescription . ", Variété: {$this->variety}";
    }

    public function grow(float $centimeters): string {
        $result = parent::grow($centimeters);

        // Le basilic développe aussi ses feuilles en grandissant
        if ($centimeters > 0) {
            $this->leafSize += intval($centimeters * 0.5);
            $result .= " Les feuilles mesurent maintenant {$this->leafSize}mm.";
        }

        return $result;
    }

    public function getCareInstructions(): string {
        $baseInstructions = parent::getCareInstructions();
        return $baseInstructions . " Attention: sensible au froid, rentrer en hiver!";
    }

    // Méthode spécifique
    public function makePesto(): string {
        if ($this->heightInCm < 15) {
            return "Le basilic est encore trop petit pour faire du pesto.";
        }
        return "Délicieux pesto préparé avec du basilic {$this->variety}!";
    }
}
