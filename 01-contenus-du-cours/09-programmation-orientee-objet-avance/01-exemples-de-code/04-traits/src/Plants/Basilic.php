<?php

namespace Plants;

require_once __DIR__ . '/../../utils/autoloader.php';

use Traits\DrinkTrait;

class Basilic {
    use DrinkTrait;

    public function grow(): string {
        return "Growing!";
    }
}
