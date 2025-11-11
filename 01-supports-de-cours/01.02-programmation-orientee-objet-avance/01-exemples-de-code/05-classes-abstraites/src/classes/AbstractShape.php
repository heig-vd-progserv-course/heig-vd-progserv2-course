<?php

// Classe abstraite de base pour toutes les formes
abstract class AbstractShape {
    protected string $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    // Getters et setters (méthodes concrètes)
    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

    // Méthodes abstraites (doivent être implémentées par les classes filles)
    abstract public function calculateArea(): float;
    abstract public function calculatePerimeter(): float;
    abstract public function draw(): string;

    // Méthode concrète utilisant les méthodes abstraites (Template Method Pattern)
    public function getAbstractShapeInfo(): string {
        return sprintf(
            "Forme: %s | Couleur: %s | Aire: %.2f | Périmètre: %.2f",
            static::class,
            $this->color,
            $this->calculateArea(),
            $this->calculatePerimeter()
        );
    }

    // Méthode concrète pour comparer les aires
    public function isLargerThan(AbstractShape $otherAbstractShape): bool {
        return $this->calculateArea() > $otherAbstractShape->calculateArea();
    }
}
