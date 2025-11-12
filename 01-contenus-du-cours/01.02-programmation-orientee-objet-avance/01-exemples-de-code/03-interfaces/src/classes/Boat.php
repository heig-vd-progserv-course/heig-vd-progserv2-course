<?php
// La notation __DIR__ permet d'obtenir le répertoire courant du fichier
// Cela permet d'inclure des fichiers de manière relative au fichier courant
// peu importe depuis quel script le fichier est inclus (index.php, test.php, etc.).
//
// Documentation : https://www.php.net/manual/fr/language.constants.predefined.php
require_once __DIR__ . '/../interfaces/VehicleInterface.php';
require_once __DIR__ . '/../interfaces/WaterVehicleInterface.php';

// Classe Boat (véhicule aquatique)
class Boat implements VehicleInterface, WaterVehicleInterface {
    private string $name;
    private string $fuelType;
    private int $maxSpeed;
    private int $depthCapability;
    private bool $isRunning = false;
    private bool $isAnchored = true;

    public function __construct(string $name, string $fuelType, int $maxSpeed, int $depthCapability = 0) {
        $this->name = $name;
        $this->fuelType = $fuelType;
        $this->maxSpeed = $maxSpeed;
        $this->depthCapability = $depthCapability;
    }

    public function getModel(): string {
        return $this->name;
    }

    public function start(): string {
        if (!$this->isRunning) {
            $this->isRunning = true;
            return "Le bateau {$this->name} démarre ses moteurs avec un grondement puissant.";
        }
        return "Le {$this->name} navigue déjà.";
    }

    public function stop(): string {
        if ($this->isRunning) {
            $this->isRunning = false;
            return "Les moteurs du {$this->name} s'arrêtent.";
        }
        return "Le {$this->name} est déjà à l'arrêt.";
    }

    public function getMaxSpeed(): int {
        return $this->maxSpeed;
    }

    public function getFuelType(): string {
        return $this->fuelType;
    }

    public function anchor(): string {
        if (!$this->isAnchored) {
            $this->isAnchored = true;
            return "Le {$this->name} jette l'ancre.";
        }
        return "Le {$this->name} est déjà ancré.";
    }

    public function getDepthCapability(): int {
        return $this->depthCapability;
    }

    public function sail(): string {
        if ($this->isRunning && !$this->isAnchored) {
            return "Le {$this->name} navigue sur les flots.";
        }
        return "Impossible de naviguer: vérifiez l'ancre et les moteurs.";
    }

    public function weighAnchor(): string {
        if ($this->isAnchored) {
            $this->isAnchored = false;
            return "Le {$this->name} lève l'ancre.";
        }
        return "L'ancre n'est pas jetée.";
    }
}
