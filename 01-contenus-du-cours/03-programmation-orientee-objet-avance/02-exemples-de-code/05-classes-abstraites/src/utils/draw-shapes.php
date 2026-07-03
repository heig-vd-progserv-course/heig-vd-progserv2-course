<?php

// Fonction pour dessiner toutes les formes
function drawShapes(array $shapes): void {
    echo "<h2>Dessin des formes</h2>";
    foreach ($shapes as $shape) {
        echo $shape->draw() . "<br>";
    }
    echo "<br>";
}
