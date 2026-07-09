<?php
// La notation __DIR__ permet d'obtenir le répertoire courant du fichier
// Cela permet d'inclure des fichiers de manière relative au fichier courant
// peu importe depuis quel script le fichier est inclus (index.php, test.php, etc.).
//
// Documentation : https://www.php.net/manual/fr/language.constants.predefined.php
require_once __DIR__ . '/../interfaces/VehicleInterface.php';
require_once __DIR__ . '/../interfaces/ElectricVehicleInterface.php';

// Classe ElectricCar (véhicule électrique)
class ElectricCar implements VehicleInterface, ElectricVehicleInterface {
    private string $model;
    private int $maxSpeed;
    private int $batteryLevel = 100;
    private int $range;
    private bool $isRunning = false;

    public function __construct(string $model, int $maxSpeed, int $range) {
        $this->model = $model;
        $this->maxSpeed = $maxSpeed;
        $this->range = $range;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function start(): string {
        if (!$this->isRunning && $this->batteryLevel > 0) {
            $this->isRunning = true;
            return "La {$this->model} électrique démarre silencieusement.";
        } elseif ($this->batteryLevel <= 0) {
            return "Impossible de démarrer: batterie vide!";
        }
        return "La {$this->model} est déjà en marche.";
    }

    public function stop(): string {
        if ($this->isRunning) {
            $this->isRunning = false;
            return "La {$this->model} s'arrête en silence.";
        }
        return "La {$this->model} est déjà arrêtée.";
    }

    public function getMaxSpeed(): int {
        return $this->maxSpeed;
    }

    public function getFuelType(): string {
        return "Électricité";
    }

    public function getBatteryLevel(): int {
        return $this->batteryLevel;
    }

    public function charge(): string {
        $this->batteryLevel = 100;
        return "La {$this->model} est maintenant chargée à 100%.";
    }

    public function getRange(): int {
        return $this->range;
    }

    public function drive(int $distance): string {
        if ($distance > 0 && $this->isRunning) {
            $batteryUsed = max(1, intval($distance / $this->range * 100));
            $this->batteryLevel = max(0, $this->batteryLevel - $batteryUsed);
            return "Conduite de {$distance}km. Batterie restante: {$this->batteryLevel}%";
        }
        return "Impossible de conduire.";
    }
}
