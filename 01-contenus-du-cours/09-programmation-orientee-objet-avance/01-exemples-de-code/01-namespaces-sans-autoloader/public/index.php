<?php

require_once __DIR__ . '/../src/Pets/Dog.php';
require_once __DIR__ . '/../src/Pets/Cat.php';

use Pets\Dog;
use Pets\Cat;

$dog = new Dog("Nalia", 30.5, "Naliouille");
$cat = new Cat("Tofu", 10.0, "Sushi");

echo $dog->getName() . " says: " . $dog->makeSound() . "<br>";
echo $cat->getName() . " says: " . $cat->makeSound() . "<br>";
