<?php
require_once __DIR__ . '/../src/Calculator.php';

$calculator = new Calculator();

// Premier calcul
echo $calculator->getCurrentValue() . "<br>";   // 0

$calculator->add(7, 3);                         // 10 (7 + 3)

echo $calculator->getCurrentValue() . "<br>";   // 10

$calculator->clear();

// Deuxième calcul
$calculator->subtract(20, 5);                   // 15 (20 - 5)

echo $calculator->getCurrentValue() . "<br>";   // 15

// Troisième calcul
$calculator->add(5);                            // 5 (0 + 5)
$calculator->add(10);                           // 15 (5 + 10)
$calculator->subtract(3);                       // 12 (15 - 3)

echo $calculator->getCurrentValue() . "<br>";   // 12

$calculator->clear();

// Quatrième calcul
$calculator->subtract(10, 15);                  // -5 (10 - 15)
$calculator->add(20);                           // 15 (-5 + 20)

echo $calculator->getCurrentValue() . "<br>";   // 15

$calculator->clear();
