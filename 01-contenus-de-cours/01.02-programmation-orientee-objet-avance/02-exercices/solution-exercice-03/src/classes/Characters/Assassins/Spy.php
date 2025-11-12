<?php

namespace Characters\Assassins;

class Spy extends AbstractAssassin {
    public function __construct(string $name, int $age, string $universe) {
        parent::__construct($name, $age, "silenced pistol", $universe);
    }
}
