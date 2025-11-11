<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: auth/login.php');
    exit();
}

// Refuser l'accès et afficher un message d'erreur avec un code 403 Forbidden
http_response_code(403);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Accès refusé | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Accès refusé</h1>

        <p>Vous n'avez pas les autorisations nécessaires pour accéder à cette page.</p>

        <p><a href="index.php">Retour à l'accueil</a></p>
    </main>
</body>

</html>
