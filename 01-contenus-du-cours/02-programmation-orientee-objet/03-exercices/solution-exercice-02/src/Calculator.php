<?php
require_once __DIR__ . '/CalculatorInterface.php';

class Calculator implements CalculatorInterface {
    private float $currentValue;

    public function __construct() {
        $this->currentValue = 0.0;
    }

    public function add(float $a, ?float $b = null): float {
        if ($b === null) {
            $b = $this->currentValue;
        }

        $this->currentValue = $a + $b;

        return $this->currentValue;
    }

    public function subtract(float $a, ?float $b = null): float {
        if ($b === null) {
            $b = $this->currentValue;
        }

        $this->currentValue = $a - $b;

        return $this->currentValue;
    }

    public function clear(): void {
        $this->currentValue = 0.0;
    }

    public function getCurrentValue(): float {
        return $this->currentValue;
    }
}
