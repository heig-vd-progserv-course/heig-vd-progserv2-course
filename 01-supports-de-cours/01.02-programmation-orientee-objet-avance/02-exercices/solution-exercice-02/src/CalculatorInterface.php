<?php
interface CalculatorInterface {
    public function add(float $a, ?float $b): float;
    public function subtract(float $a, ?float $b): float;
    public function clear(): void;
}
