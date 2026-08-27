<?php
require_once __DIR__ . '/../utils/autoloader.php';

use Animals\Dog;
use Plants\Basilic;

$dog = new Dog();
echo $dog->bark() . "<br>";
echo $dog->drink() . "<br>";
echo "Dog's water level: " . $dog->waterLevel . "<br>";

$basilic = new Basilic();
echo $basilic->grow() . "<br>";
echo $basilic->drink() . "<br>";
echo "Basilic's water level: " . $basilic->waterLevel . "<br>";
