<?php

// Interface pour les véhicules aquatiques
interface WaterVehicleInterface {
    public function anchor(): string;
    public function getDepthCapability(): int;
}
