<?php

namespace Characters;

abstract class AbstractCharacter {
    protected string $name;
    protected int $age;
    protected string $weapon;
    protected string $universe;

    public function __construct(string $name, int $age, string $weapon, string $universe) {
        $this->name = $name;
        $this->age = $age;
        $this->weapon = $weapon;
        $this->universe = $universe;
    }

    abstract public function attack(): string;
}
