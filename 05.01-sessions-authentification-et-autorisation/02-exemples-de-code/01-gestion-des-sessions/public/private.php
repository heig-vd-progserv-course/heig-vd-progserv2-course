<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
$userId = $_SESSION['user_id'] ?? null;

// L'utilisateur n'est pas authentifié
if (!$userId) {
    // Stocke le message flash
    $_SESSION['flash'] = 'Vous devez être connectée pour accéder à cette page.';

    // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
    header('Location: auth/login.php');
    exit();
}

// Sinon, récupère les autres informations de l'utilisateur
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Page privée | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Page privée</h1>

        <p>Cette page est accessible uniquement aux personnes authentifiées.</p>

        <ul>
            <li><strong>ID utilisateur :</strong> <?= htmlspecialchars($userId) ?></li>
            <li><strong>Nom d'utilisateur :</strong> <?= htmlspecialchars($username) ?></li>
            <li><strong>Rôle :</strong> <?= htmlspecialchars($role) ?></li>
        </ul>

        <p><a href="index.php">Retour à l'accueil</a> | <a href="auth/logout.php">Se déconnecter</a></p>
    </main>
</body>

</html>
