<?php

/**
 * Exemple 8 : Classes abstraites - Formes géométriques
 * 
 * Cet exemple illustre :
 * - La définition de classes abstraites avec abstract
 * - L'implémentation obligatoire de méthodes abstraites
 * - La combinaison de méthodes concrètes et abstraites
 * - L'impossibilité d'instancier une classe abstraite
 * - L'utilisation du polymorphisme avec des classes abstraites
 */

// Classe abstraite de base pour toutes les formes
abstract class Shape {
    protected string $color;
    protected float $x; // Position X
    protected float $y; // Position Y

    public function __construct(string $color, float $x = 0.0, float $y = 0.0) {
        $this->color = $color;
        $this->x = $x;
        $this->y = $y;
    }

    // Getters et setters (méthodes concrètes)
    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

    public function getPosition(): array {
        return ['x' => $this->x, 'y' => $this->y];
    }

    public function setPosition(float $x, float $y): void {
        $this->x = $x;
        $this->y = $y;
    }

    public function move(float $deltaX, float $deltaY): void {
        $this->x += $deltaX;
        $this->y += $deltaY;
    }

    // Méthodes abstraites (doivent être implémentées par les classes filles)
    abstract public function calculateArea(): float;
    abstract public function calculatePerimeter(): float;
    abstract public function draw(): string;

    // Méthode concrète utilisant les méthodes abstraites (Template Method Pattern)
    public function getShapeInfo(): string {
        return sprintf(
            "Forme: %s | Couleur: %s | Position: (%.1f, %.1f) | Aire: %.2f | Périmètre: %.2f",
            static::class,
            $this->color,
            $this->x,
            $this->y,
            $this->calculateArea(),
            $this->calculatePerimeter()
        );
    }

    // Méthode concrète pour comparer les aires
    public function isLargerThan(Shape $otherShape): bool {
        return $this->calculateArea() > $otherShape->calculateArea();
    }

    // Méthode concrète pour calculer la distance entre deux formes
    public function distanceTo(Shape $otherShape): float {
        $otherPos = $otherShape->getPosition();
        $deltaX = $this->x - $otherPos['x'];
        $deltaY = $this->y - $otherPos['y'];
        return sqrt($deltaX * $deltaX + $deltaY * $deltaY);
    }
}

// Classe Rectangle héritant de Shape
class Rectangle extends Shape {
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
        return "Dessine un rectangle {$this->color} de {$this->width}x{$this->height} à la position ({$this->x}, {$this->y}).";
    }

    // Méthodes spécifiques au rectangle
    public function isSquare(): bool {
        return abs($this->width - $this->height) < 0.001; // Comparaison avec tolérance pour les flottants
    }

    public function getDiagonal(): float {
        return sqrt($this->width * $this->width + $this->height * $this->height);
    }
}

// Classe Circle héritant de Shape
class Circle extends Shape {
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
        return "Dessine un cercle {$this->color} de rayon {$this->radius} centré en ({$this->x}, {$this->y}).";
    }

    // Méthodes spécifiques au cercle
    public function getDiameter(): float {
        return 2 * $this->radius;
    }

    public function getCircumference(): float {
        return $this->calculatePerimeter(); // Alias pour périmètre
    }
}

// Classe Triangle héritant de Shape
class Triangle extends Shape {
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
        return "Dessine un triangle {$this->color} de base {$this->base} et hauteur {$this->height} à la position ({$this->x}, {$this->y}).";
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

// Fonction pour analyser un ensemble de formes
function analyzeShapes(array $shapes): void {
    echo "=== Analyse des formes ===\n";

    if (empty($shapes)) {
        echo "Aucune forme à analyser.\n\n";
        return;
    }

    $totalArea = 0;
    $totalPerimeter = 0;
    $shapeTypes = [];
    $colors = [];

    foreach ($shapes as $shape) {
        $area = $shape->calculateArea();
        $perimeter = $shape->calculatePerimeter();

        $totalArea += $area;
        $totalPerimeter += $perimeter;

        $type = basename(get_class($shape));
        $shapeTypes[$type] = ($shapeTypes[$type] ?? 0) + 1;

        $color = $shape->getColor();
        $colors[$color] = ($colors[$color] ?? 0) + 1;

        echo $shape->getShapeInfo() . "\n";
    }

    echo "\n=== Statistiques ===\n";
    echo "Nombre total de formes: " . count($shapes) . "\n";
    echo "Aire totale: " . number_format($totalArea, 2) . "\n";
    echo "Périmètre total: " . number_format($totalPerimeter, 2) . "\n";

    echo "Répartition par type:\n";
    foreach ($shapeTypes as $type => $count) {
        echo "  - {$type}: {$count}\n";
    }

    echo "Répartition par couleur:\n";
    foreach ($colors as $color => $count) {
        echo "  - {$color}: {$count}\n";
    }
    echo "\n";
}

// Fonction pour trouver la plus grande forme
function findLargestShape(array $shapes): ?Shape {
    if (empty($shapes)) {
        return null;
    }

    $largest = $shapes[0];
    foreach ($shapes as $shape) {
        if ($shape->calculateArea() > $largest->calculateArea()) {
            $largest = $shape;
        }
    }

    return $largest;
}

// Fonction pour dessiner toutes les formes
function drawAllShapes(array $shapes): void {
    echo "=== Dessin des formes ===\n";
    foreach ($shapes as $shape) {
        echo $shape->draw() . "\n";
    }
    echo "\n";
}

// Démonstration
echo "=== Exemple 8 : Classes abstraites - Formes géométriques ===\n\n";

// Tentative d'instanciation de la classe abstraite (ceci générerait une erreur)
// $shape = new Shape("red"); // ❌ Erreur fatale!

// Création de formes concrètes
$rectangle = new Rectangle("bleu", 10, 5, 0, 0);
$square = new Rectangle("rouge", 8, 8, 15, 0);
$circle = new Circle("vert", 6, 30, 0);
$triangle = new Triangle("jaune", 12, 8, 45, 0);

// Tableau de formes (polymorphisme)
$shapes = [$rectangle, $square, $circle, $triangle];

// Analyse des formes
analyzeShapes($shapes);

// Dessin des formes
drawAllShapes($shapes);

// Tests des méthodes spécifiques
echo "=== Tests spécifiques ===\n";
echo "Le rectangle est-il un carré? " . ($rectangle->isSquare() ? "Oui" : "Non") . "\n";
echo "Le carré est-il un carré? " . ($square->isSquare() ? "Oui" : "Non") . "\n";
echo "Diagonale du rectangle: " . number_format($rectangle->getDiagonal(), 2) . "\n";
echo "Diamètre du cercle: " . number_format($circle->getDiameter(), 2) . "\n";

$triangleAngles = $triangle->getAngles();
echo "Angles du triangle: " .
    number_format($triangleAngles['base1'], 1) . "°, " .
    number_format($triangleAngles['base2'], 1) . "°, " .
    number_format($triangleAngles['top'], 1) . "°\n\n";

// Comparaisons entre formes
echo "=== Comparaisons ===\n";
echo "Le cercle est-il plus grand que le rectangle? " . ($circle->isLargerThan($rectangle) ? "Oui" : "Non") . "\n";
echo "Distance entre le rectangle et le cercle: " . number_format($rectangle->distanceTo($circle), 2) . "\n";

// Recherche de la plus grande forme
$largest = findLargestShape($shapes);
if ($largest) {
    echo "La plus grande forme est: " . basename(get_class($largest)) . " avec une aire de " .
        number_format($largest->calculateArea(), 2) . "\n";
}

// Déplacement des formes
echo "\n=== Déplacement des formes ===\n";
echo "Position initiale du rectangle: ";
$pos = $rectangle->getPosition();
echo "({$pos['x']}, {$pos['y']})\n";

$rectangle->move(5, 10);
$pos = $rectangle->getPosition();
echo "Position après déplacement: ({$pos['x']}, {$pos['y']})\n";

// Modification des propriétés
echo "\n=== Modification des propriétés ===\n";
echo "Avant: " . $circle->getShapeInfo() . "\n";
$circle->setRadius(10);
$circle->setColor("violet");
echo "Après: " . $circle->getShapeInfo() . "\n";
