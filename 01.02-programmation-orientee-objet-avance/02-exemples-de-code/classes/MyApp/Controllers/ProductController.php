<?php

namespace MyApp\Controllers;

use MyApp\Services\ProductService;
use MyApp\Utils\Logger;

/**
 * Contrôleur pour gérer les actions produit
 */
class ProductController {
    private ProductService $productService;
    private Logger $logger;

    public function __construct(ProductService $productService, Logger $logger) {
        $this->productService = $productService;
        $this->logger = $logger;
        $this->logger->info("ProductController initialisé");
    }

    public function listProducts(): void {
        $this->logger->info("Affichage de la liste des produits");

        $products = $this->productService->getAllProducts();

        if (empty($products)) {
            echo "📦 Aucun produit trouvé.\n";
            return;
        }

        echo "📦 Liste des produits (" . count($products) . "):\n";
        echo str_repeat("-", 80) . "\n";

        foreach ($products as $product) {
            echo sprintf(
                "ID: %d | %s | %.2f€ | Stock: %d | Valeur: %.2f€\n",
                $product->getId(),
                $product->getName(),
                $product->getPrice(),
                $product->getStock(),
                $product->getTotalValue()
            );
        }
        echo str_repeat("-", 80) . "\n";
    }

    public function showProduct(int $productId): void {
        $this->logger->info("Affichage détaillé produit ID: {$productId}");

        $product = $this->productService->findById($productId);

        if (!$product) {
            echo "❌ Produit introuvable avec l'ID: {$productId}\n";
            return;
        }

        echo "📦 Détails du produit:\n";
        echo "  ID: " . $product->getId() . "\n";
        echo "  Nom: " . $product->getName() . "\n";
        echo "  Prix unitaire: " . number_format($product->getPrice(), 2) . "€\n";
        echo "  Stock: " . $product->getStock() . " unité(s)\n";
        echo "  Valeur totale: " . number_format($product->getTotalValue(), 2) . "€\n";
    }

    public function createProduct(string $name, float $price, int $stock = 0): void {
        $this->logger->info("Tentative de création produit via contrôleur");

        $product = $this->productService->createProduct($name, $price, $stock);

        if ($product) {
            echo "✅ Produit créé avec succès!\n";
            echo "  ID: " . $product->getId() . "\n";
            echo "  Nom: " . $product->getName() . "\n";
            echo "  Prix: " . number_format($product->getPrice(), 2) . "€\n";
            echo "  Stock: " . $product->getStock() . "\n";
        } else {
            echo "❌ Échec de la création du produit.\n";
        }
    }

    public function updateStock(int $productId, int $newStock): void {
        $this->logger->info("Tentative de mise à jour stock produit ID: {$productId}");

        if ($this->productService->updateStock($productId, $newStock)) {
            echo "✅ Stock mis à jour avec succès!\n";
        } else {
            echo "❌ Échec de la mise à jour du stock.\n";
        }
    }

    public function updatePrice(int $productId, float $newPrice): void {
        $this->logger->info("Tentative de mise à jour prix produit ID: {$productId}");

        if ($this->productService->updatePrice($productId, $newPrice)) {
            echo "✅ Prix mis à jour avec succès!\n";
        } else {
            echo "❌ Échec de la mise à jour du prix.\n";
        }
    }

    public function getInventoryStats(): void {
        $this->logger->info("Affichage des statistiques d'inventaire");

        $products = $this->productService->getAllProducts();
        $totalValue = $this->productService->getTotalInventoryValue();
        $lowStockProducts = $this->productService->getLowStockProducts();

        echo "📊 Statistiques de l'inventaire:\n";
        echo "  Nombre de produits: " . count($products) . "\n";
        echo "  Valeur totale: " . number_format($totalValue, 2) . "€\n";
        echo "  Produits en stock faible (≤5): " . count($lowStockProducts) . "\n";

        if (!empty($lowStockProducts)) {
            echo "  ⚠️  Produits à réapprovisionner:\n";
            foreach ($lowStockProducts as $product) {
                echo "    - {$product->getName()}: {$product->getStock()} unité(s)\n";
            }
        }

        if (!empty($products)) {
            $avgPrice = array_sum(array_map(fn($p) => $p->getPrice(), $products)) / count($products);
            $totalStock = array_sum(array_map(fn($p) => $p->getStock(), $products));
            echo "  Prix moyen: " . number_format($avgPrice, 2) . "€\n";
            echo "  Stock total: {$totalStock} unité(s)\n";
        }
    }

    public function searchProducts(string $query): void {
        $this->logger->info("Recherche de produits: {$query}");

        $products = $this->productService->getAllProducts();
        $results = array_filter($products, function ($product) use ($query) {
            return stripos($product->getName(), $query) !== false;
        });

        if (empty($results)) {
            echo "🔍 Aucun produit trouvé pour: {$query}\n";
            return;
        }

        echo "🔍 Résultats de recherche pour '{$query}' (" . count($results) . "):\n";
        foreach ($results as $product) {
            echo "  - {$product->getName()} | {$product->getPrice()}€ | Stock: {$product->getStock()}\n";
        }
    }
}
