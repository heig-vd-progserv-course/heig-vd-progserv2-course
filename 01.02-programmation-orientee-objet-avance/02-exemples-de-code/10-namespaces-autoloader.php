<?php

/**
 * Exemple 10 : Espaces de noms (Namespaces) et Autoloader
 * 
 * Cet exemple illustre :
 * - L'organisation du code avec des namespaces
 * - L'utilisation de 'use' pour importer des classes
 * - L'autoloader pour charger automatiquement les classes
 * - La structure de projet avec plusieurs dossiers
 */

// Cet autoloader simple charge les classes selon leur namespace
spl_autoload_register(function ($className) {
    // Conversion du namespace en chemin de fichier
    // Ex: MyApp\Models\User -> classes/Models/User.php
    $classPath = __DIR__ . '/classes/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($classPath)) {
        require_once $classPath;
        echo "🔄 Classe chargée automatiquement: {$className}\n";
    }
});

// Utilisation des classes avec leurs namespaces complets
use MyApp\Models\User;
use MyApp\Models\Product;
use MyApp\Services\UserService;
use MyApp\Services\ProductService;
use MyApp\Controllers\UserController;
use MyApp\Controllers\ProductController;
use MyApp\Utils\Logger;
use MyApp\Utils\Validator;

echo "=== Exemple 10 : Namespaces et Autoloader ===\n\n";

// Test du logger (utilitaire)
$logger = new Logger();
$logger->info("Application démarrée");

// Test du validateur
$validator = new Validator();
$isValidEmail = $validator->validateEmail("user@example.com");
$logger->info("Validation email: " . ($isValidEmail ? "valide" : "invalide"));

// Création d'utilisateurs via le service
$userService = new UserService($logger);
$user1 = $userService->createUser("Alice", "Martin", "alice@example.com");
$user2 = $userService->createUser("Bob", "Dupont", "bob@example.com");

// Création de produits via le service
$productService = new ProductService($logger);
$product1 = $productService->createProduct("Laptop", 999.99, 10);
$product2 = $productService->createProduct("Mouse", 29.99, 50);

// Utilisation des contrôleurs
$userController = new UserController($userService, $logger);
$productController = new ProductController($productService, $logger);

echo "\n=== Test des contrôleurs ===\n";
$userController->listUsers();
$productController->listProducts();

// Démonstration de l'aliasing de namespace
echo "\n=== Test avec alias de namespace ===\n";

use MyApp\Models as Models;
use MyApp\Services as Services;

$newUser = new Models\User("Charlie", "Brown", "charlie@example.com");
$logger->info("Utilisateur créé avec alias: " . $newUser->getFullName());

echo "\n=== Résumé ===\n";
echo "✅ Autoloader configuré et fonctionnel\n";
echo "✅ Classes organisées en namespaces\n";
echo "✅ Import avec 'use' effectué\n";
echo "✅ Alias de namespaces testés\n";
$logger->info("Exemple terminé avec succès");
