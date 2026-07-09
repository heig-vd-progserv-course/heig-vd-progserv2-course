<?php

namespace Characters\Warriors;

class Soldier extends AbstractWarrior {
    public function __construct(string $name, int $age, string $universe) {
        parent::__construct($name, $age, "assault rifle", $universe);
    }
}
