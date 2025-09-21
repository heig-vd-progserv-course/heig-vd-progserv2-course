<?php

require_once __DIR__ . '/../src/utils/autoloader.php';

use Characters\Assassins\Ninja;
use Characters\Assassins\Spy;
use Characters\Mages\Wizard;
use Characters\Mages\Witch;
use Characters\Warriors\Soldier;
use Characters\Warriors\Pyrotechnician;

$ninja = new Ninja("Ibuki", 19, "Street Fighter");
$spy = new Spy("Agent 47", 40, "Hitman");
$wizard = new Wizard("Gandalf", 100, "Lord of the Rings");
$witch = new Witch("Hermione Granger", 30, "Harry Potter");
$soldier = new Soldier("Master Chief", 45, "Halo");
$pyrotechnician = new Pyrotechnician("Jinx", 28, "Arcane");

$characters = [$ninja, $spy, $wizard, $witch, $soldier, $pyrotechnician];

foreach ($characters as $character) {
    echo $character->attack() . "<br>";
}
