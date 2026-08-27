<?php

namespace Animals;

require_once __DIR__ . '/../../utils/autoloader.php';

use Traits\DrinkTrait;

class Dog {
    use DrinkTrait;

    public function bark(): string {
        return "Woof!";
    }
}
