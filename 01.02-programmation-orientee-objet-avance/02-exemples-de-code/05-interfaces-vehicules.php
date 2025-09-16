<?php

/**
 * Exemple 5 : Interface pour différents types de véhicules
 * 
 * Cet exemple montre comment une même interface peut être implémentée
 * par des classes très différentes, démontrant la flexibilité du polymorphisme.
 */

// Interface principale pour tous les véhicules
interface VehicleInterface {
    public function start(): string;
    public function stop(): string;
    public function getMaxSpeed(): int;
    public function getFuelType(): string;
}

// Interface pour les véhicules électriques
interface ElectricVehicleInterface {
    public function getBatteryLevel(): int;
    public function charge(): string;
    public function getRange(): int;
}

// Interface pour les véhicules aquatiques
interface WaterVehicleInterface {
    public function anchor(): string;
    public function getDepthCapability(): int;
}

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

    public function getModel(): string {
        return $this->model;
    }

    public function honk(): string {
        return "Beep beep!";
    }
}

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

// Fonction pour tester un véhicule (polymorphisme)
function testVehicle(VehicleInterface $vehicle): void {
    echo "=== Test du véhicule ===\n";
    echo "Type de carburant: " . $vehicle->getFuelType() . "\n";
    echo "Vitesse maximale: " . $vehicle->getMaxSpeed() . " km/h\n";
    echo $vehicle->start() . "\n";

    // Tests spécifiques selon le type
    if ($vehicle instanceof ElectricVehicleInterface) {
        echo "Niveau de batterie: " . $vehicle->getBatteryLevel() . "%\n";
        echo "Autonomie: " . $vehicle->getRange() . " km\n";
    }

    if ($vehicle instanceof WaterVehicleInterface) {
        echo "Capacité de profondeur: " . $vehicle->getDepthCapability() . " m\n";
        if ($vehicle instanceof Boat) {
            echo $vehicle->weighAnchor() . "\n";
            echo $vehicle->sail() . "\n";
        }
    }

    echo $vehicle->stop() . "\n";
    echo "\n";
}

// Fonction pour afficher les statistiques d'une flotte
function displayFleetStats(array $vehicles): void {
    echo "=== Statistiques de la flotte ===\n";

    $totalVehicles = count($vehicles);
    $electricCount = 0;
    $waterCount = 0;
    $avgSpeed = 0;
    $fuelTypes = [];

    foreach ($vehicles as $vehicle) {
        if ($vehicle instanceof ElectricVehicleInterface) {
            $electricCount++;
        }
        if ($vehicle instanceof WaterVehicleInterface) {
            $waterCount++;
        }
        $avgSpeed += $vehicle->getMaxSpeed();

        $fuelType = $vehicle->getFuelType();
        $fuelTypes[$fuelType] = ($fuelTypes[$fuelType] ?? 0) + 1;
    }

    $avgSpeed = intval($avgSpeed / $totalVehicles);

    echo "Nombre total de véhicules: {$totalVehicles}\n";
    echo "Véhicules électriques: {$electricCount}\n";
    echo "Véhicules aquatiques: {$waterCount}\n";
    echo "Vitesse moyenne: {$avgSpeed} km/h\n";
    echo "Types de carburant:\n";
    foreach ($fuelTypes as $type => $count) {
        echo "  - {$type}: {$count} véhicule(s)\n";
    }
    echo "\n";
}

// Démonstration
echo "=== Exemple 5 : Interfaces pour véhicules ===\n\n";

// Création de différents types de véhicules
$car = new Car("BMW Serie 3", "Essence", 250);
$electricCar = new ElectricCar("Tesla Model 3", 261, 500);
$boat = new Boat("Sea Explorer", "Diesel", 45, 50);

// Test individuel de chaque véhicule
testVehicle($car);
testVehicle($electricCar);
testVehicle($boat);

// Test spécifique de la voiture électrique
echo "=== Test spécifique de la voiture électrique ===\n";
echo $electricCar->start() . "\n";
echo $electricCar->drive(100) . "\n";
echo $electricCar->drive(450) . "\n";
echo $electricCar->charge() . "\n";
echo $electricCar->stop() . "\n\n";

// Statistiques de flotte
$fleet = [$car, $electricCar, $boat];
displayFleetStats($fleet);

// Démonstration du polymorphisme avec un tableau mixte
echo "=== Démarrage de tous les véhicules ===\n";
foreach ($fleet as $vehicle) {
    echo $vehicle->start() . "\n";
}
