<?php

// Fonction pour simuler une saison de croissance
function simulateGrowthSeason(array $plants): void {
    echo "<h2>Simulation d'une saison de croissance</h2>";

    foreach ($plants as $plant) {
        echo "<h3>{$plant->getEnglishName()}</h3>";
        echo $plant->getDescription() . "<br>";

        // Croissance aléatoire
        $growth = rand(5, 20);
        echo $plant->grow($growth) . "<br>";

        // Actions spécifiques selon le type
        if ($plant instanceof Basil && $plant->getHeightInCm() > 15) {
            echo $plant->makePesto() . "<br>";
        }

        if ($plant instanceof Rosemary && rand(1, 3) === 1) {
            echo $plant->bloom() . "<br>";
        }

        if ($plant instanceof Herb) {
            echo $plant->harvest() . "<br>";
        }

        echo "Instructions d'entretien: " . $plant->getCareInstructions() . "<br>";
    }
}
