<?php

namespace Plants;

use Traits\DrinkTrait;

class Orchid {
    use DrinkTrait;

    public function __construct() {
        $this->name = "Orchidée";
    }
}
