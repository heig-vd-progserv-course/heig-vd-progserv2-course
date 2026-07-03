<?php
require_once __DIR__ . '/../src/Product.php';

// Démonstration
echo "<h1>Exemple : Attributs et méthodes statiques</h1>";

// Utilisation de méthodes statiques sans créer d'instance
echo "<h2>Statistiques initiales:</h2>";
Product::displayGlobalStats();

// Création de produits
$laptop = new Product("Laptop Dell", 899.95, 15, "Informatique");
$mouse = new Product("Souris sans fil", 29.95, 50, "Informatique");
$book = new Product("Livre PHP", 45.00, 25, "Livres");
$chair = new Product("Chaise ergonomique", 199.95, 8, "Mobilier");

// Affichage des produits
echo "<h2>Produits créés:</h2>";
echo $laptop->displayInfo() . "<br>";
echo $mouse->displayInfo() . "<br>";
echo $book->displayInfo() . "<br>";
echo $chair->displayInfo() . "<br>";

// Statistiques après création
echo "<h2>Statistiques après création des produits:</h2>";
Product::displayGlobalStats();

// Modification du stock
echo "<h2>Modification du stock du laptop (15 -> 20):</h2>";
$laptop->updateStock(20);
echo $laptop->displayInfo() . "<br><br>";

// Statistiques après modification
echo "<h2>Statistiques après modification:</h2>";
Product::displayGlobalStats();

// Utilisation de méthodes statiques utilitaires
echo "<h2>Formatage de prix avec méthode statique:</h2>";
echo "Prix formaté: " . Product::formatPrice(1234.56) . "<br><br>";

// Création d'un produit avec la factory method
echo "<h2>Création d'un produit par défaut:</h2>";
$defaultProduct = Product::createDefaultProduct("Produit test");
echo $defaultProduct->displayInfo() . "<br><br>";

// Statistiques finales
echo "<h2>Statistiques finales:</h2>";
Product::displayGlobalStats();
