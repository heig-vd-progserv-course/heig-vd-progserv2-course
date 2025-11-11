<?php

namespace Characters\Mages;

require_once __DIR__ . '/../../../utils/autoloader.php';

use Characters\AbstractCharacter;

abstract class AbstractMage extends AbstractCharacter {
    public function __construct(string $name, int $age, string $weapon, string $universe) {
        parent::__construct($name, $age, $weapon, $universe);
    }

    public function attack(): string {
        return "{$this->name} ({$this->universe}) casts a spell with a {$this->weapon}!";
    }
}
