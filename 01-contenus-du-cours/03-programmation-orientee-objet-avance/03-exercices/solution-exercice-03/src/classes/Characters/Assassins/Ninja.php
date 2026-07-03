<?php

namespace Characters\Assassins;

class Ninja extends AbstractAssassin {
    public function __construct(string $name, int $age, string $universe) {
        parent::__construct($name, $age, "katana", $universe);
    }
}
