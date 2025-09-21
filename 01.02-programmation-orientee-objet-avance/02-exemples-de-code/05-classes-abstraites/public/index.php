<?php
require_once __DIR__ . '/../src/classes/AbstractShape.php';
require_once __DIR__ . '/../src/classes/Rectangle.php';
require_once __DIR__ . '/../src/classes/Circle.php';
require_once __DIR__ . '/../src/classes/Triangle.php';
require_once __DIR__ . '/../src/utils/analyze-shapes.php';
require_once __DIR__ . '/../src/utils/draw-shapes.php';
require_once __DIR__ . '/../src/utils/find-largest-shape.php';

// Démonstration
echo "<h1>Exemple : Classes abstraites</h1>";

// Tentative d'instanciation de la classe abstraite (ceci générerait une erreur)
// $shape = new AbstractShape("red"); // ❌ Erreur fatale!

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
drawShapes($shapes);

// Tests des méthodes spécifiques
echo "<h2>Tests spécifiques</h2>";

echo "Le rectangle est-il un carré? " . ($rectangle->isSquare() ? "Oui" : "Non") . "<br>";
echo "Le carré est-il un carré? " . ($square->isSquare() ? "Oui" : "Non") . "<br>";
echo "Diagonale du rectangle: " . number_format($rectangle->getDiagonal(), 2) . "<br>";
echo "Diamètre du cercle: " . number_format($circle->getDiameter(), 2) . "<br>";

$triangleAngles = $triangle->getAngles();
echo "Angles du triangle: " .
    number_format($triangleAngles['base1'], 1) . "°, " .
    number_format($triangleAngles['base2'], 1) . "°, " .
    number_format($triangleAngles['top'], 1) . "°<br>";

// Comparaisons entre formes
echo "<h2>Comparaisons entre formes</h2>";

echo "Le cercle est-il plus grand que le rectangle? " . ($circle->isLargerThan($rectangle) ? "Oui" : "Non") . "<br>";
echo "Le triangle est-il plus grand que le carré? " . ($triangle->isLargerThan($square) ? "Oui" : "Non") . "<br>";

// Recherche de la plus grande forme
$largest = findLargestShape($shapes);

if ($largest) {
    echo "La plus grande forme est: " . basename(get_class($largest)) . " avec une aire de " .
        number_format($largest->calculateArea(), 2) . "<br>";
}

// Modification des propriétés
echo "<h2>Modification des propriétés</h2>";
echo "Avant: " . $circle->getAbstractShapeInfo() . "<br>";
$circle->setRadius(10);
$circle->setColor("violet");
echo "Après: " . $circle->getAbstractShapeInfo() . "<br>";
