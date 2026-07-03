<?php

// Fonction pour analyser un ensemble de formes
function analyzeShapes(array $shapes): void {
    echo "<h2>Analyse des formes</h2>";

    if (empty($shapes)) {
        echo "Aucune forme à analyser.<br>";
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
        // L'opérateur ?? permet d'initialiser une variable à une valeur par défaut si elle n'existe pas/n'est pas définie.
        // Documentation : https://www.php.net/manual/fr/language.operators.comparison.php#language.operators.comparison.coalesce
        $shapeTypes[$type] = ($shapeTypes[$type] ?? 0) + 1;

        $color = $shape->getColor();
        $colors[$color] = ($colors[$color] ?? 0) + 1;

        echo $shape->getAbstractShapeInfo() . "<br>";
    }

    echo "<h3>Statistiques</h3>";
    echo "Nombre total de formes : " . count($shapes) . "<br>";
    echo "Aire totale : " . number_format($totalArea, 2) . "<br>";
    echo "Périmètre total : " . number_format($totalPerimeter, 2) . "<br>";

    echo "<h3>Répartition par type:</h3>";
    foreach ($shapeTypes as $type => $count) {
        echo "  - {$type} : {$count}<br>";
    }

    echo "<h3>Répartition par couleur:</h3>";
    foreach ($colors as $color => $count) {
        echo "  - {$color} : {$count}<br>";
    }
    echo "<br>";
}
