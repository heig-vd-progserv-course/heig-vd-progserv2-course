<?php
require_once __DIR__ . '/AbstractShape.php';

// Classe Triangle héritant de AbstractShape
class Triangle extends AbstractShape {
    private float $base;
    private float $height;
    private float $sideA;
    private float $sideB;

    public function __construct(string $color, float $base, float $height, float $x = 0.0, float $y = 0.0) {
        parent::__construct($color, $x, $y);
        $this->base = max(0, $base);
        $this->height = max(0, $height);

        // Calcul approximatif des côtés pour un triangle isocèle
        $this->sideA = $this->base;
        $this->sideB = sqrt(($this->base / 2) * ($this->base / 2) + $this->height * $this->height);
    }

    public function getBase(): float {
        return $this->base;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function setBase(float $base): void {
        $this->base = max(0, $base);
        // Recalcul des côtés
        $this->sideA = $this->base;
        $this->sideB = sqrt(($this->base / 2) * ($this->base / 2) + $this->height * $this->height);
    }

    public function setHeight(float $height): void {
        $this->height = max(0, $height);
        // Recalcul du côté B
        $this->sideB = sqrt(($this->base / 2) * ($this->base / 2) + $this->height * $this->height);
    }

    // Implémentation des méthodes abstraites
    public function calculateArea(): float {
        return 0.5 * $this->base * $this->height;
    }

    public function calculatePerimeter(): float {
        return $this->sideA + $this->sideB + $this->sideB; // Triangle isocèle
    }

    public function draw(): string {
        return "Dessine un triangle {$this->color} de base {$this->base} et hauteur {$this->height}.";
    }

    // Méthodes spécifiques au triangle
    public function isIsosceles(): bool {
        return abs($this->sideB - $this->sideB) < 0.001; // Toujours vrai dans notre implémentation
    }

    public function getAngles(): array {
        // Calcul approximatif des angles (en degrés)
        $angleBase = rad2deg(atan($this->height / ($this->base / 2)));
        $angleTop = 180 - 2 * $angleBase;

        return [
            'base1' => $angleBase,
            'base2' => $angleBase,
            'top' => $angleTop
        ];
    }
}
