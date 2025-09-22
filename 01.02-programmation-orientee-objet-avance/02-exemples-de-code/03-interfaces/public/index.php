<?php
require_once '../src/classes/Car.php';
require_once '../src/classes/ElectricCar.php';
require_once '../src/classes/Boat.php';
require_once '../src/utils/test-vehicle.php';

echo "<h1>Exemple : Interfaces</h1>";

// Création de différents types de véhicules
$car = new Car("BMW Serie 3", "Essence", 250);
$electricCar = new ElectricCar("Toyota bZ4X", 261, 500);
$boat = new Boat("Sea Explorer", "Diesel", 45, 50);

// Test individuel de chaque véhicule
testVehicle($car);
testVehicle($electricCar);
testVehicle($boat);

// Test spécifique de la voiture électrique
echo "<h2>Test spécifique de la voiture électrique</h2>";
echo $electricCar->start() . "<br>";
echo $electricCar->drive(100) . "<br>";
echo $electricCar->drive(450) . "<br>";
echo $electricCar->stop() . "<br>";
echo $electricCar->charge() . "<br>";
