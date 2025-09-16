<?php

/**
 * Exemple 3 : Classe avec attributs statiques et méthodes statiques
 * 
 * Cet exemple illustre :
 * - Les propriétés statiques partagées entre toutes les instances
 * - Les méthodes statiques qui ne dépendent pas d'une instance
 * - La différence entre $this et self/static
 */

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
            "Produit: %s | Prix: %.2f€ | Stock: %d | Catégorie: %s | Valeur totale: %.2f€",
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
        return number_format($price, 2, ',', ' ') . '€';
    }

    // Méthode statique pour afficher les statistiques globales
    public static function displayGlobalStats(): void {
        echo "=== Statistiques globales des produits ===\n";
        echo "Nombre total de produits: " . self::$totalProducts . "\n";
        echo "Valeur totale du stock: " . self::formatPrice(self::getTotalStockValue()) . "\n";
        echo "Nombre de catégories: " . self::getCategoryCount() . "\n";
        echo "Catégories: " . implode(', ', self::$categories) . "\n\n";
    }

    // Méthode statique pour créer un produit avec des valeurs par défaut
    public static function createDefaultProduct(string $name): Product {
        return new self($name, 0.0, 0, 'Non classé');
    }
}

// Démonstration
echo "=== Exemple 3 : Propriétés et méthodes statiques ===\n\n";

// Utilisation de méthodes statiques sans créer d'instance
echo "Statistiques initiales:\n";
Product::displayGlobalStats();

// Création de produits
$laptop = new Product("Laptop Dell", 899.99, 15, "Informatique");
$mouse = new Product("Souris sans fil", 29.99, 50, "Informatique");
$book = new Product("Livre PHP", 45.00, 25, "Livres");
$chair = new Product("Chaise ergonomique", 199.99, 8, "Mobilier");

// Affichage des produits
echo "Produits créés:\n";
echo $laptop->displayInfo() . "\n";
echo $mouse->displayInfo() . "\n";
echo $book->displayInfo() . "\n";
echo $chair->displayInfo() . "\n\n";

// Statistiques après création
echo "Statistiques après création des produits:\n";
Product::displayGlobalStats();

// Modification du stock
echo "Modification du stock du laptop (15 -> 20):\n";
$laptop->updateStock(20);
echo $laptop->displayInfo() . "\n\n";

// Statistiques après modification
echo "Statistiques après modification:\n";
Product::displayGlobalStats();

// Utilisation de méthodes statiques utilitaires
echo "Formatage de prix avec méthode statique:\n";
echo "Prix formaté: " . Product::formatPrice(1234.56) . "\n\n";

// Création d'un produit avec la factory method
echo "Création d'un produit par défaut:\n";
$defaultProduct = Product::createDefaultProduct("Produit test");
echo $defaultProduct->displayInfo() . "\n\n";

// Statistiques finales
echo "Statistiques finales:\n";
Product::displayGlobalStats();
