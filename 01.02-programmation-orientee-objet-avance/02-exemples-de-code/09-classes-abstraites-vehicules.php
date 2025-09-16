<?php

/**
 * Exemple 9 : Classes abstraites - Système de véhicules
 * 
 * Cet exemple montre :
 * - Une classe abstraite avec des méthodes concrètes et abstraites
 * - L'héritage avec des niveaux multiples (Vehicle -> LandVehicle -> Car)
 * - La combinaison d'interfaces et de classes abstraites
 * - La réutilisation de code grâce à l'abstraction
 */

// Interface pour les véhicules motorisés
interface MotorizedInterface {
    public function startEngine(): string;
    public function stopEngine(): string;
    public function isEngineRunning(): bool;
}

// Interface pour les véhicules avec réservoir
interface FuelTankInterface {
    public function getFuelLevel(): float;
    public function refuel(float $amount): string;
    public function consumeFuel(float $amount): bool;
}

// Classe abstraite de base pour tous les véhicules
abstract class Vehicle {
    protected string $brand;
    protected string $model;
    protected int $year;
    protected float $maxSpeed;
    protected float $currentSpeed;
    protected string $color;

    public function __construct(string $brand, string $model, int $year, float $maxSpeed, string $color) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->maxSpeed = $maxSpeed;
        $this->currentSpeed = 0.0;
        $this->color = $color;
    }

    // Getters (méthodes concrètes)
    public function getBrand(): string {
        return $this->brand;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getYear(): int {
        return $this->year;
    }

    public function getMaxSpeed(): float {
        return $this->maxSpeed;
    }

    public function getCurrentSpeed(): float {
        return $this->currentSpeed;
    }

    public function getColor(): string {
        return $this->color;
    }

    // Méthodes concrètes communes
    public function accelerate(float $speed): string {
        $newSpeed = min($this->currentSpeed + $speed, $this->maxSpeed);
        $oldSpeed = $this->currentSpeed;
        $this->currentSpeed = $newSpeed;

        return sprintf(
            "%s %s accélère de %.1f km/h à %.1f km/h",
            $this->brand,
            $this->model,
            $oldSpeed,
            $newSpeed
        );
    }

    public function brake(float $speed): string {
        $newSpeed = max($this->currentSpeed - $speed, 0);
        $oldSpeed = $this->currentSpeed;
        $this->currentSpeed = $newSpeed;

        return sprintf(
            "%s %s freine de %.1f km/h à %.1f km/h",
            $this->brand,
            $this->model,
            $oldSpeed,
            $newSpeed
        );
    }

    public function stop(): string {
        $this->currentSpeed = 0;
        return "{$this->brand} {$this->model} s'arrête complètement.";
    }

    public function getVehicleInfo(): string {
        return sprintf(
            "%s %s (%d) - Couleur: %s, Vitesse max: %.0f km/h, Vitesse actuelle: %.1f km/h",
            $this->brand,
            $this->model,
            $this->year,
            $this->color,
            $this->maxSpeed,
            $this->currentSpeed
        );
    }

    // Méthodes abstraites que les classes filles doivent implémenter
    abstract public function getVehicleType(): string;
    abstract public function move(): string;
    abstract public function getMaintenanceInfo(): array;
}

// Classe abstraite pour les véhicules terrestres
abstract class LandVehicle extends Vehicle {
    protected int $numberOfWheels;
    protected string $transmissionType;

    public function __construct(
        string $brand,
        string $model,
        int $year,
        float $maxSpeed,
        string $color,
        int $numberOfWheels,
        string $transmissionType = "Manuelle"
    ) {
        parent::__construct($brand, $model, $year, $maxSpeed, $color);
        $this->numberOfWheels = $numberOfWheels;
        $this->transmissionType = $transmissionType;
    }

    public function getNumberOfWheels(): int {
        return $this->numberOfWheels;
    }

    public function getTransmissionType(): string {
        return $this->transmissionType;
    }

    // Implémentation de la méthode abstraite héritée
    public function move(): string {
        if ($this->currentSpeed > 0) {
            return "{$this->brand} {$this->model} roule sur {$this->numberOfWheels} roues à {$this->currentSpeed} km/h.";
        }
        return "{$this->brand} {$this->model} est à l'arrêt.";
    }

    // Méthode concrète spécifique aux véhicules terrestres
    public function turn(string $direction): string {
        return "{$this->brand} {$this->model} tourne à {$direction}.";
    }

    // Méthodes abstraites spécifiques aux véhicules terrestres
    abstract public function park(): string;
}

// Classe concrète Car
class Car extends LandVehicle implements MotorizedInterface, FuelTankInterface {
    private bool $engineRunning;
    private float $fuelLevel; // en litres
    private float $fuelCapacity; // en litres
    private float $fuelConsumption; // litres/100km
    private int $numberOfDoors;

    public function __construct(
        string $brand,
        string $model,
        int $year,
        float $maxSpeed,
        string $color,
        float $fuelCapacity = 50.0,
        int $numberOfDoors = 4
    ) {
        parent::__construct($brand, $model, $year, $maxSpeed, $color, 4, "Manuelle");
        $this->engineRunning = false;
        $this->fuelLevel = $fuelCapacity * 0.8; // 80% plein initialement
        $this->fuelCapacity = $fuelCapacity;
        $this->fuelConsumption = 7.0; // 7L/100km par défaut
        $this->numberOfDoors = $numberOfDoors;
    }

    public function getNumberOfDoors(): int {
        return $this->numberOfDoors;
    }

    public function getFuelConsumption(): float {
        return $this->fuelConsumption;
    }

    public function setFuelConsumption(float $consumption): void {
        $this->fuelConsumption = max(1.0, $consumption);
    }

    // Implémentation des méthodes abstraites
    public function getVehicleType(): string {
        return "Voiture";
    }

    public function park(): string {
        $this->stop();
        return "{$this->brand} {$this->model} se gare.";
    }

    public function getMaintenanceInfo(): array {
        return [
            "Vidange moteur: tous les 15,000 km",
            "Contrôle pneus: mensuel",
            "Révision générale: annuelle",
            "Contrôle technique: tous les 2 ans"
        ];
    }

    // Implémentation de MotorizedInterface
    public function startEngine(): string {
        if (!$this->engineRunning && $this->fuelLevel > 0) {
            $this->engineRunning = true;
            return "Le moteur de la {$this->brand} {$this->model} démarre.";
        } elseif ($this->fuelLevel <= 0) {
            return "Impossible de démarrer: réservoir vide!";
        }
        return "Le moteur est déjà en marche.";
    }

    public function stopEngine(): string {
        if ($this->engineRunning) {
            $this->engineRunning = false;
            $this->currentSpeed = 0;
            return "Le moteur de la {$this->brand} {$this->model} s'arrête.";
        }
        return "Le moteur est déjà arrêté.";
    }

    public function isEngineRunning(): bool {
        return $this->engineRunning;
    }

    // Implémentation de FuelTankInterface
    public function getFuelLevel(): float {
        return $this->fuelLevel;
    }

    public function refuel(float $amount): string {
        $actualAmount = min($amount, $this->fuelCapacity - $this->fuelLevel);
        $this->fuelLevel += $actualAmount;

        return sprintf(
            "Ajout de %.1fL de carburant. Niveau actuel: %.1fL/%.1fL",
            $actualAmount,
            $this->fuelLevel,
            $this->fuelCapacity
        );
    }

    public function consumeFuel(float $amount): bool {
        if ($this->fuelLevel >= $amount) {
            $this->fuelLevel -= $amount;
            return true;
        }
        return false;
    }

    // Redéfinition de accelerate pour inclure la consommation
    public function accelerate(float $speed): string {
        if (!$this->engineRunning) {
            return "Impossible d'accélérer: moteur arrêté!";
        }

        $result = parent::accelerate($speed);

        // Consommation de carburant basée sur l'accélération
        $fuelConsumed = ($speed / 100) * $this->fuelConsumption * 0.01;
        if (!$this->consumeFuel($fuelConsumed)) {
            $this->currentSpeed = 0;
            $this->engineRunning = false;
            return $result . " PANNE SÈCHE!";
        }

        return $result;
    }

    // Méthodes spécifiques à la voiture
    public function openDoors(): string {
        return "Les {$this->numberOfDoors} portes de la {$this->brand} {$this->model} s'ouvrent.";
    }

    public function getRange(): float {
        if ($this->fuelConsumption > 0) {
            return ($this->fuelLevel / $this->fuelConsumption) * 100;
        }
        return 0;
    }
}

// Classe concrète Bicycle (véhicule terrestre non motorisé)
class Bicycle extends LandVehicle {
    private string $bikeType;
    private int $numberOfGears;
    private int $currentGear;

    public function __construct(
        string $brand,
        string $model,
        int $year,
        string $color,
        string $bikeType = "VTT",
        int $numberOfGears = 21
    ) {
        parent::__construct($brand, $model, $year, 45, $color, 2); // Max 45 km/h pour un vélo
        $this->bikeType = $bikeType;
        $this->numberOfGears = $numberOfGears;
        $this->currentGear = 1;
    }

    public function getBikeType(): string {
        return $this->bikeType;
    }

    public function getNumberOfGears(): int {
        return $this->numberOfGears;
    }

    public function getCurrentGear(): int {
        return $this->currentGear;
    }

    // Implémentation des méthodes abstraites
    public function getVehicleType(): string {
        return "Vélo {$this->bikeType}";
    }

    public function park(): string {
        $this->stop();
        return "Le vélo {$this->brand} {$this->model} est garé et attaché.";
    }

    public function getMaintenanceInfo(): array {
        return [
            "Graissage chaîne: hebdomadaire",
            "Vérification pneus: avant chaque sortie",
            "Réglage freins: selon besoin",
            "Révision générale: tous les 6 mois"
        ];
    }

    // Méthodes spécifiques au vélo
    public function changeGear(int $gear): string {
        if ($gear >= 1 && $gear <= $this->numberOfGears) {
            $oldGear = $this->currentGear;
            $this->currentGear = $gear;
            return "Changement de vitesse: {$oldGear} -> {$gear}";
        }
        return "Vitesse invalide! (1-{$this->numberOfGears})";
    }

    public function pedal(): string {
        if ($this->currentSpeed < $this->maxSpeed) {
            return "Pédalage en vitesse {$this->currentGear}. Effort physique requis!";
        }
        return "Vitesse maximale atteinte!";
    }

    public function brake(float $speed): string {
        $result = parent::brake($speed);
        return $result . " (freinage manuel)";
    }
}

// Fonction pour tester un véhicule
function testVehicle(Vehicle $vehicle): void {
    echo "=== Test de {$vehicle->getBrand()} {$vehicle->getModel()} ===\n";
    echo "Type: " . $vehicle->getVehicleType() . "\n";
    echo $vehicle->getVehicleInfo() . "\n";

    // Tests spécifiques selon les interfaces
    if ($vehicle instanceof MotorizedInterface) {
        echo $vehicle->startEngine() . "\n";
    }

    if ($vehicle instanceof FuelTankInterface) {
        echo "Niveau de carburant: " . $vehicle->getFuelLevel() . "L\n";
    }

    echo $vehicle->accelerate(30) . "\n";
    echo $vehicle->move() . "\n";

    if ($vehicle instanceof LandVehicle) {
        echo $vehicle->turn("droite") . "\n";
    }

    echo $vehicle->brake(15) . "\n";
    echo $vehicle->move() . "\n";

    if ($vehicle instanceof LandVehicle) {
        echo $vehicle->park() . "\n";
    }

    if ($vehicle instanceof MotorizedInterface) {
        echo $vehicle->stopEngine() . "\n";
    }

    echo "Maintenance requise:\n";
    foreach ($vehicle->getMaintenanceInfo() as $maintenance) {
        echo "  - {$maintenance}\n";
    }
    echo "\n";
}

// Démonstration
echo "=== Exemple 9 : Classes abstraites - Système de véhicules ===\n\n";

// Création de véhicules
$car1 = new Car("Toyota", "Corolla", 2023, 180, "blanc", 45, 4);
$car1->setFuelConsumption(6.5);

$car2 = new Car("BMW", "X5", 2024, 240, "noir", 70, 5);
$car2->setFuelConsumption(9.2);

$bike1 = new Bicycle("Trek", "Mountain 3700", 2023, "rouge", "VTT", 21);
$bike2 = new Bicycle("Giant", "Road Bike", 2024, "bleu", "Route", 16);

$vehicles = [$car1, $car2, $bike1, $bike2];

// Test de chaque véhicule
foreach ($vehicles as $vehicle) {
    testVehicle($vehicle);
}

// Tests spécifiques aux voitures
echo "=== Tests spécifiques aux voitures ===\n";
echo $car1->openDoors() . "\n";
echo "Autonomie estimée: " . number_format($car1->getRange(), 1) . " km\n";
echo $car1->refuel(10) . "\n";
echo "Nouvelle autonomie: " . number_format($car1->getRange(), 1) . " km\n\n";

// Tests spécifiques aux vélos
echo "=== Tests spécifiques aux vélos ===\n";
echo $bike1->changeGear(5) . "\n";
echo $bike1->pedal() . "\n";
echo $bike1->accelerate(20) . "\n";
echo $bike1->changeGear(8) . "\n";
echo $bike1->pedal() . "\n\n";

// Statistiques de flotte
echo "=== Statistiques de la flotte ===\n";
$motorizedCount = 0;
$totalMaxSpeed = 0;
$fuelVehicles = 0;

foreach ($vehicles as $vehicle) {
    if ($vehicle instanceof MotorizedInterface) {
        $motorizedCount++;
    }
    if ($vehicle instanceof FuelTankInterface) {
        $fuelVehicles++;
    }
    $totalMaxSpeed += $vehicle->getMaxSpeed();
}

echo "Nombre total de véhicules: " . count($vehicles) . "\n";
echo "Véhicules motorisés: {$motorizedCount}\n";
echo "Véhicules avec réservoir: {$fuelVehicles}\n";
echo "Vitesse maximale moyenne: " . intval($totalMaxSpeed / count($vehicles)) . " km/h\n";
