<?php

namespace MyApp\Services;

use MyApp\Models\Product;
use MyApp\Utils\Logger;
use MyApp\Utils\Validator;

/**
 * Service pour gérer les produits
 */
class ProductService {
    private array $products = [];
    private Logger $logger;
    private Validator $validator;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
        $this->validator = new Validator();
        $this->logger->info("ProductService initialisé");
    }

    public function createProduct(string $name, float $price, int $stock = 0): ?Product {
        $this->logger->info("Tentative de création produit: {$name}");

        // Validation
        $errors = $this->validator->validateProduct($name, $price, $stock);
        if (!empty($errors)) {
            $this->logger->error("Erreurs de validation: " . implode(", ", $errors));
            return null;
        }

        // Vérifier si le produit existe déjà
        if ($this->findByName($name)) {
            $this->logger->error("Produit déjà existant: {$name}");
            return null;
        }

        $product = new Product($name, $price, $stock);
        $this->products[] = $product;

        $this->logger->info("Produit créé avec ID: " . $product->getId());
        return $product;
    }

    public function findById(int $id): ?Product {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }

    public function findByName(string $name): ?Product {
        foreach ($this->products as $product) {
            if (strtolower($product->getName()) === strtolower($name)) {
                return $product;
            }
        }
        return null;
    }

    public function getAllProducts(): array {
        return $this->products;
    }

    public function getProductCount(): int {
        return count($this->products);
    }

    public function updateStock(int $productId, int $newStock): bool {
        $product = $this->findById($productId);
        if (!$product) {
            $this->logger->error("Produit introuvable avec ID: {$productId}");
            return false;
        }

        if ($newStock < 0) {
            $this->logger->error("Le stock ne peut pas être négatif");
            return false;
        }

        $oldStock = $product->getStock();
        $product->addStock($newStock - $oldStock);
        $this->logger->info("Stock mis à jour pour produit {$productId}: {$oldStock} -> {$newStock}");
        return true;
    }

    public function updatePrice(int $productId, float $newPrice): bool {
        $product = $this->findById($productId);
        if (!$product) {
            $this->logger->error("Produit introuvable avec ID: {$productId}");
            return false;
        }

        if (!$this->validator->validatePositive($newPrice)) {
            $this->logger->error("Le prix doit être positif: {$newPrice}");
            return false;
        }

        $oldPrice = $product->getPrice();
        $product->setPrice($newPrice);
        $this->logger->info("Prix mis à jour pour produit {$productId}: {$oldPrice}€ -> {$newPrice}€");
        return true;
    }

    public function getTotalInventoryValue(): float {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getTotalValue();
        }
        return $total;
    }

    public function getLowStockProducts(int $threshold = 5): array {
        return array_filter($this->products, function ($product) use ($threshold) {
            return $product->getStock() <= $threshold;
        });
    }
}
