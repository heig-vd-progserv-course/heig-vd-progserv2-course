<?php
// La notation __DIR__ permet d'obtenir le répertoire courant du fichier
// Cela permet d'inclure des fichiers de manière relative au fichier courant
// peu importe depuis quel script le fichier est inclus (index.php, test.php, etc.).
//
// Documentation : https://www.php.net/manual/fr/language.constants.predefined.php
require_once __DIR__ . '/../interfaces/VehicleInterface.php';

// Classe Car (véhicule terrestre classique)
class Car implements VehicleInterface {
    private string $model;
    private string $fuelType;
    private int $maxSpeed;
    private bool $isRunning = false;

    public function __construct(string $model, string $fuelType, int $maxSpeed) {
        $this->model = $model;
        $this->fuelType = $fuelType;
        $this->maxSpeed = $maxSpeed;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function start(): string {
        if (!$this->isRunning) {
            $this->isRunning = true;
            return "La {$this->model} démarre avec un vrombissement du moteur.";
        }
        return "La {$this->model} est déjà en marche.";
    }

    public function stop(): string {
        if ($this->isRunning) {
            $this->isRunning = false;
            return "La {$this->model} s'arrête et le moteur se tait.";
        }
        return "La {$this->model} est déjà arrêtée.";
    }

    public function getMaxSpeed(): int {
        return $this->maxSpeed;
    }

    public function getFuelType(): string {
        return $this->fuelType;
    }

    public function honk(): string {
        return "Beep beep!";
    }
}
