<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Tools\ToolsManager;

// Création d'une instance de ToolsManager
$toolsManager = new ToolsManager();

// Vérification si l'ID de l'outil est passé dans l'URL
if (isset($_GET["id"])) {
    // Récupération de l'ID de l'outil de la superglobale `$_GET`
    $toolId = $_GET["id"];

    // Suppression de l'outil correspondant à l'ID
    $toolsManager->removeTool($toolId);

    header("Location: index.php");
    exit();
} else {
    // Si l'ID n'est pas passé dans l'URL, redirection vers la page d'accueil
    header("Location: index.php");
    exit();
}
