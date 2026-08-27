<?php

namespace Plants;

use Traits\DrinkTrait;
use Traits\SmellTrait;

class Rose {
    use DrinkTrait;
    use SmellTrait;

    public function __construct() {
        $this->name = "Rose";
    }
}
