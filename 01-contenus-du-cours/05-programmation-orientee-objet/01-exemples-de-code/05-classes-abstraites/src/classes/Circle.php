<?php
require_once __DIR__ . '/AbstractShape.php';

// Classe Circle héritant de AbstractShape
class Circle extends AbstractShape {
    private float $radius;

    public function __construct(string $color, float $radius, float $x = 0.0, float $y = 0.0) {
        parent::__construct($color, $x, $y);
        $this->radius = max(0, $radius);
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setRadius(float $radius): void {
        $this->radius = max(0, $radius);
    }

    // Implémentation des méthodes abstraites
    public function calculateArea(): float {
        return pi() * $this->radius * $this->radius;
    }

    public function calculatePerimeter(): float {
        return 2 * pi() * $this->radius;
    }

    public function draw(): string {
        return "Dessine un cercle {$this->color} de rayon {$this->radius}.";
    }

    // Méthodes spécifiques au cercle
    public function getDiameter(): float {
        return 2 * $this->radius;
    }

    public function getCircumference(): float {
        return $this->calculatePerimeter(); // Alias pour périmètre
    }
}
