<?php

class Product {
    // Propriétés d'instance
    private string $name;
    private float $price;
    private int $stock;
    private string $category;

    // Propriétés statiques (partagées entre toutes les instances)
    private static int $totalProducts = 0;
    private static array $categories = [];
    private static float $totalValue = 0.0;

    public function __construct(string $name, float $price, int $stock, string $category) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;

        // Mise à jour des statistiques globales
        self::$totalProducts++;
        self::$totalValue += ($price * $stock);

        // Ajout de la catégorie si elle n'existe pas
        if (!in_array($category, self::$categories)) {
            self::$categories[] = $category;
        }
    }

    // Getters classiques
    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function getCategory(): string {
        return $this->category;
    }

    // Méthodes d'instance
    public function updateStock(int $newStock): void {
        $oldValue = $this->price * $this->stock;
        $newValue = $this->price * $newStock;

        self::$totalValue += ($newValue - $oldValue);
        $this->stock = $newStock;
    }

    public function getProductValue(): float {
        return $this->price * $this->stock;
    }

    public function displayInfo(): string {
        return sprintf(
            "Produit: %s | Prix: %.2f.- CHF | Stock: %d | Catégorie: %s | Valeur totale: %.2f.- CHF",
            $this->name,
            $this->price,
            $this->stock,
            $this->category,
            $this->getProductValue()
        );
    }

    // Méthodes statiques (accessibles sans instance)
    public static function getTotalProducts(): int {
        return self::$totalProducts;
    }

    public static function getTotalStockValue(): float {
        return self::$totalValue;
    }

    public static function getCategories(): array {
        return self::$categories;
    }

    public static function getCategoryCount(): int {
        return count(self::$categories);
    }

    // Méthode statique utilitaire
    public static function formatPrice(float $price): string {
        return number_format($price, 2, '.', "'") . '.- CHF';
    }

    // Méthode statique pour afficher les statistiques globales
    public static function displayGlobalStats(): void {
        echo "<h3>Statistiques globales des produits</h3>";
        echo "Nombre total de produits: " . self::$totalProducts . "</br>";
        echo "Valeur totale du stock: " . self::formatPrice(self::getTotalStockValue()) . "</br>";
        echo "Nombre de catégories: " . self::getCategoryCount() . "</br>";
        echo "Catégories: " . implode(', ', self::$categories) . "</br>";
    }

    // Méthode statique pour créer un produit avec des valeurs par défaut
    public static function createDefaultProduct(string $name): Product {
        return new self($name, 0.0, 0, 'Non classé');
    }
}
