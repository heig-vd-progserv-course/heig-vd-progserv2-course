<?php

namespace Characters\Warriors;

class Pyrotechnician extends AbstractWarrior {
    public function __construct(string $name, int $age, string $universe) {
        parent::__construct($name, $age, "fireworks", $universe);
    }
}
