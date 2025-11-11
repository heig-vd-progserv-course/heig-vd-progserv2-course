<?php
// La notation __DIR__ permet d'obtenir le répertoire courant du fichier
// Cela permet d'inclure des fichiers de manière relative au fichier courant
// peu importe depuis quel script le fichier est inclus (index.php, test.php, etc.).
//
// Documentation : https://www.php.net/manual/fr/language.constants.predefined.php
require_once __DIR__ . '/../src/interfaces/VehicleInterface.php';
require_once __DIR__ . '/../src/interfaces/ElectricVehicleInterface.php';
require_once __DIR__ . '/../src/interfaces/WaterVehicleInterface.php';

// Fonction pour tester un véhicule (polymorphisme)
function testVehicle(VehicleInterface $vehicle): void {
    echo "<h2>Test du véhicule " . $vehicle->getModel() . "</h2>";
    echo "Type de carburant: " . $vehicle->getFuelType() . "<br>";
    echo "Vitesse maximale: " . $vehicle->getMaxSpeed() . " km/h<br>";
    echo $vehicle->start() . "<br>";

    // Tests spécifiques selon le type
    if ($vehicle instanceof ElectricVehicleInterface) {
        echo "Niveau de batterie: " . $vehicle->getBatteryLevel() . "%<br>";
        echo "Autonomie: " . $vehicle->getRange() . " km<br>";
    }

    if ($vehicle instanceof WaterVehicleInterface) {
        echo "Capacité de profondeur: " . $vehicle->getDepthCapability() . " m<br>";
        if ($vehicle instanceof Boat) {
            echo $vehicle->weighAnchor() . "<br>";
            echo $vehicle->sail() . "<br>";
        }
    }

    echo $vehicle->stop() . "<br>";
    echo "<br>";
}
