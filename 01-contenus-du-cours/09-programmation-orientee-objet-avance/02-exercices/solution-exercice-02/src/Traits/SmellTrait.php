<?php

namespace Traits;

trait SmellTrait {
    private string $name;

    public function smell(): string {
        return "Cette plante ({$this->name}) sent une odeur agréable.";
    }
}
