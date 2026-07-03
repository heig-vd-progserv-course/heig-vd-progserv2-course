<?php

namespace Characters\Mages;

class Witch extends AbstractMage {
    public function __construct(string $name, int $age, string $universe) {
        parent::__construct($name, $age, "magic wand", $universe);
    }
}
