<?php

namespace MyApp\Models;

/**
 * Classe Product dans le namespace MyApp\Models
 */
class Product {
    private string $name;
    private float $price;
    private int $stock;
    private int $id;
    private static int $nextId = 1;

    public function __construct(string $name, float $price, int $stock = 0) {
        $this->name = $name;
        $this->price = max(0, $price);
        $this->stock = max(0, $stock);
        $this->id = self::$nextId++;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function setPrice(float $price): void {
        $this->price = max(0, $price);
    }

    public function addStock(int $quantity): void {
        $this->stock += max(0, $quantity);
    }

    public function removeStock(int $quantity): bool {
        if ($quantity <= $this->stock) {
            $this->stock -= $quantity;
            return true;
        }
        return false;
    }

    public function getTotalValue(): float {
        return $this->price * $this->stock;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'totalValue' => $this->getTotalValue()
        ];
    }
}
