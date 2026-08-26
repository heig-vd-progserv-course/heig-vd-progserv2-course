<?php
class Vehicle {
    const BRAND_TOYOTA = 'Toyota';
    const BRAND_YAMAHA = 'Yamaha';
    const BRAND_VOLVO = 'Volvo';

    const TYPE_CAR = 'Car';
    const TYPE_MOTORCYCLE = 'Motorcycle';
    const TYPE_TRUCK = 'Truck';
    const TYPE_UNKNOWN = 'Unknown';

    private int $numberOfWheels;
    private string $color;
    private string $brand;
    private string $model;

    public function __construct(int $numberOfWheels, string $color, string $brand, string $model) {
        $this->numberOfWheels = $numberOfWheels;
        $this->color = $color;
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getNumberOfWheels(): int {
        return $this->numberOfWheels;
    }

    public function setNumberOfWheels(int $numberOfWheels): void {
        $this->numberOfWheels = $numberOfWheels;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function setBrand(string $brand): void {
        $this->brand = $brand;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function setModel(string $model): void {
        $this->model = $model;
    }

    public function getDescription(): string {
        return "$this->brand $this->model, $this->color, $this->numberOfWheels wheels";
    }

    public function type(): string {
        if ($this->numberOfWheels == 2) {
            return self::TYPE_MOTORCYCLE;
        } elseif ($this->numberOfWheels == 4) {
            return self::TYPE_CAR;
        } elseif ($this->numberOfWheels > 4) {
            return self::TYPE_TRUCK;
        } else {
            return self::TYPE_UNKNOWN;
        }
    }
}
