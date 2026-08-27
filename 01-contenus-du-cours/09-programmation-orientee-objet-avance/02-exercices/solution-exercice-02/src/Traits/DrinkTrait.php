<?php

namespace Traits;

trait DrinkTrait {
    private string $name;

    public function drink(): string {
        return "Cette plante ({$this->name}) boit de l'eau.";
    }
}
