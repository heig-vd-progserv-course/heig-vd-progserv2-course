<?php

// Fonction pour trouver la plus grande forme
// La notation "?AbstractShape" indique que la fonction peut retourner une instance de AbstractShape ou null
function findLargestShape(array $shapes): ?AbstractShape {
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
