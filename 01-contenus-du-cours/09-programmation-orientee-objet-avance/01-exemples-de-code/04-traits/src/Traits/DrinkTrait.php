<?php

namespace Traits;

trait DrinkTrait {
    public int $waterLevel = 100;

    public function drink(): string {
        $this->waterLevel -= 10;
        return "Drinking water!";
    }

    public function giveWater(): string {
        $this->waterLevel += 10;
        return "Giving water!";
    }
}
