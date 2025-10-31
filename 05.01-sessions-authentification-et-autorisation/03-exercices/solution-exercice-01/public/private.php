<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
$userId = $_SESSION['user_id'] ?? null;

// L'utilisateur n'est pas authentifié
if (!$userId) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
    header('Location: auth/login.php');
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
    <title>Page privée | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Page privée</h1>

        <article style="background-color: var(--pico-ins-color);">
            <p><strong>✓ Bienvenue sur votre espace personnel !</strong></p>
            <p>Cette page est accessible uniquement aux personnes authentifiées.</p>
        </article>

        <h2>Vos informations</h2>

        <ul>
            <li><strong>Email :</strong> <?= htmlspecialchars($email) ?></li>
            <li><strong>Rôle :</strong> <?= htmlspecialchars($role === 'author' ? 'Auteur.trice' : 'Lecteur.trice') ?></li>
        </ul>

        <h2>Fonctionnalités disponibles</h2>

        <?php if ($role === 'author') { ?>
            <p>En tant qu'auteur.trice, vous avez accès à des fonctionnalités supplémentaires :</p>
            <ul>
                <li>Publier de nouveaux livres</li>
                <li>Modifier vos livres existants</li>
                <li>Consulter les statistiques de vos livres</li>
            </ul>
            <p><a href="author.php">Accéder à l'espace auteur</a></p>
        <?php } else { ?>
            <p>En tant que lecteur.trice, vous pouvez :</p>
            <ul>
                <li>Consulter votre bibliothèque personnelle</li>
                <li>Écrire des critiques de livres</li>
                <li>Créer des listes de lecture</li>
            </ul>
        <?php } ?>

        <p><a href="index.php">Retour à l'accueil</a> | <a href="auth/logout.php">Se déconnecter</a></p>
    </main>
</body>

</html>
