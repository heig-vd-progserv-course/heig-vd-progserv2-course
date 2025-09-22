<?php

namespace Characters\Mages;

class Wizard extends AbstractMage {
    public function __construct(string $name, int $age, string $universe) {
        parent::__construct($name, $age, "magic staff", $universe);
    }
}
