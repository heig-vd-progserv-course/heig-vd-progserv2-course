<?php

// Classe parent (de base)
class Plant {
    protected string $englishName;
    protected string $latinName;
    protected float $heightInCm;
    protected string $soilType;
    protected int $wateringFrequency; // jours entre arrosages

    public function __construct(string $englishName, string $latinName, float $heightInCm = 0.0) {
        $this->englishName = $englishName;
        $this->latinName = $latinName;
        $this->heightInCm = $heightInCm;
        $this->soilType = "Universel";
        $this->wateringFrequency = 7; // Par défaut, une fois par semaine
    }

    // Getters
    public function getEnglishName(): string {
        return $this->englishName;
    }

    public function getLatinName(): string {
        return $this->latinName;
    }

    public function getHeightInCm(): float {
        return $this->heightInCm;
    }

    public function getSoilType(): string {
        return $this->soilType;
    }

    public function getWateringFrequency(): int {
        return $this->wateringFrequency;
    }

    // Setters
    public function setHeightInCm(float $heightInCm): void {
        $this->heightInCm = max(0, $heightInCm);
    }

    public function setSoilType(string $soilType): void {
        $this->soilType = $soilType;
    }

    public function setWateringFrequency(int $days): void {
        $this->wateringFrequency = max(1, $days);
    }

    // Méthodes que les classes filles peuvent redéfinir
    public function grow(float $centimeters): string {
        $oldHeight = $this->heightInCm;
        $this->heightInCm += $centimeters;
        return "{$this->englishName} a grandi de {$centimeters}cm (de {$oldHeight}cm à {$this->heightInCm}cm).";
    }

    public function getDescription(): string {
        return "Plante : {$this->englishName} ({$this->latinName}), Hauteur: {$this->heightInCm}cm";
    }

    public function getCareInstructions(): string {
        return "Arroser tous les {$this->wateringFrequency} jours. Sol recommandé: {$this->soilType}.";
    }

    // Méthode qui sera peut-être redéfinie
    public function canBeGrown(string $climate): bool {
        return in_array($climate, ['tempéré', 'méditerranéen']);
    }
}
