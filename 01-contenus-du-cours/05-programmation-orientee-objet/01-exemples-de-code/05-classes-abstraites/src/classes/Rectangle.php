<?php
require_once __DIR__ . '/AbstractShape.php';

// Classe Rectangle héritant de AbstractShape
class Rectangle extends AbstractShape {
    private float $width;
    private float $height;

    public function __construct(string $color, float $width, float $height, float $x = 0.0, float $y = 0.0) {
        parent::__construct($color, $x, $y);
        $this->width = max(0, $width);
        $this->height = max(0, $height);
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function setWidth(float $width): void {
        $this->width = max(0, $width);
    }

    public function setHeight(float $height): void {
        $this->height = max(0, $height);
    }

    // Implémentation des méthodes abstraites
    public function calculateArea(): float {
        return $this->width * $this->height;
    }

    public function calculatePerimeter(): float {
        return 2 * ($this->width + $this->height);
    }

    public function draw(): string {
        return "Dessine un rectangle {$this->color} de {$this->width}x{$this->height}.";
    }

    // Méthodes spécifiques au rectangle
    public function isSquare(): bool {
        return abs($this->width - $this->height) < 0.001; // Comparaison avec tolérance pour les nombres flottants
    }

    public function getDiagonal(): float {
        return sqrt($this->width * $this->width + $this->height * $this->height);
    }
}
