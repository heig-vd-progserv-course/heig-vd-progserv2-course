<?php
// Démarrer la session
session_start();

// Vérifie si l'utilisateur est authentifié
$userId = $_SESSION['user_id'] ?? null;

if (!$userId) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
    header('Location: login.php');
    exit();
}

// Détruit la session
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Déconnexion | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Déconnexion réussie</h1>

        <p>Vous avez été déconnecté avec succès.</p>

        <p><a href="../index.php">Retour à l'accueil</a> | <a href="login.php">Se connecter à nouveau</a></p>
    </main>
</body>

</html>
