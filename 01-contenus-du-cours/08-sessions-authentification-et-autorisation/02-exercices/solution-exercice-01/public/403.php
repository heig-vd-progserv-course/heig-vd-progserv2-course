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
    <title>Accès refusé | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Accès refusé</h1>

        <p><strong>✗ Vous n'avez pas les autorisations nécessaires pour accéder à cette page.</strong></p>

        <p>Cette page est réservée aux auteur.trice.s uniquement.</p>

        <p>Vous êtes connecté.e en tant que <strong><?= htmlspecialchars($_SESSION['email']) ?></strong> avec le rôle <strong><?= htmlspecialchars($_SESSION['role'] === 'author' ? 'Auteur.trice' : 'Lecteur.trice') ?></strong>.</p>

        <h2>Comment devenir auteur.trice ?</h2>

        <p>Si vous souhaitez publier vos propres livres, vous devez créer un compte avec le rôle "Auteur.trice".</p>

        <p><a href="index.php">Retour à l'accueil</a></p>
    </main>
</body>

</html>
