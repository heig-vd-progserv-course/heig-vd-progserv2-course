<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Users\UsersManager;

// Création d'une instance de UsersManager
$usersManager = new UsersManager();

// Vérification si l'ID de l'utilisateur est passé dans l'URL
if (isset($_GET["id"])) {
    // Récupération de l'ID de l'utilisateur de la superglobale `$_GET`
    $userId = $_GET["id"];

    // Suppression de l'utilisateur correspondant à l'ID
    $usersManager->removeUser($userId);

    header("Location: index.php");
    exit();
} else {
    // Si l'ID n'est pas passé dans l'URL, redirection vers la page d'accueil
    header("Location: index.php");
    exit();
}
