<?php

namespace Plants;

use Traits\DrinkTrait;
use Traits\SmellTrait;

class Basilic {
    use DrinkTrait;
    use SmellTrait;

    public function __construct() {
        $this->name = "Basilic";
    }
}
