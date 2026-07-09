<?php
// Constantes
const DATABASE_FILE = __DIR__ . '/../books.db';

// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: auth/login.php');
    exit();
}

// Vérifie si l'utilisateur a le bon rôle
if ($_SESSION['role'] !== 'author') {
    // Redirige vers la page 403 si l'utilisateur n'est pas author
    header('Location: 403.php');
    exit();
}

// Sinon, récupère les autres informations de l'utilisateur
$email = $_SESSION['email'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Espace auteur.trice | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Espace auteur.trice</h1>

        <p>Cette page est accessible uniquement aux auteur.trices.</p>

        <p><a href="index.php">Retour à l'accueil</a> | <a href="./auth/logout.php">Se déconnecter</a></p>
    </main>
</body>

</html>
