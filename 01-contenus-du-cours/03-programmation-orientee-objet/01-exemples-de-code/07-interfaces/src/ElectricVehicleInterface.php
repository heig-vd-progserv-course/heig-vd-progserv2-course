<?php

// Interface pour les véhicules électriques
interface ElectricVehicleInterface {
    public function getBatteryLevel(): int;
    public function charge(): string;
    public function getRange(): int;
}
