<?php
require_once __DIR__ . '/../utils/autoloader.php';

use Plants\Basilic;
use Plants\Cactus;
use Plants\Orchid;
use Plants\Rose;

$basilic = new Basilic();
$cactus = new Cactus();
$orchid = new Orchid();
$rose = new Rose();

echo $basilic->drink() . "<br>";
echo $basilic->smell() . "<br>";
echo $rose->drink() . "<br>";
echo $rose->smell() . "<br>";
echo $orchid->drink() . "<br>";
echo $orchid->smell() . "<br>"; // Cette ligne provoque une erreur car l'orchidée n'a pas de méthode smell()
echo $cactus->drink() . "<br>"; // Cette ligne provoque une erreur car le cactus n'a pas de méthode drink()
echo $cactus->smell() . "<br>"; // Cette ligne provoque une erreur car le cactus n'a pas de méthode smell()
