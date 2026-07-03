<?php

// Interface principale pour tous les véhicules
interface VehicleInterface {
    public function getModel(): string;
    public function start(): string;
    public function stop(): string;
    public function getMaxSpeed(): int;
    public function getFuelType(): string;
}
