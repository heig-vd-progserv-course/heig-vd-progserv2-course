<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
$userId = $_SESSION['user_id'] ?? null;

// L'utilisateur est authentifié
if ($userId) {
    // Récupère les autres informations de l'utilisateur
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Page publique | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Page publique</h1>

        <p>Cette page est accessible à toutes les personnes, qu'elles soient connectées ou non.</p>

        <p>Bienvenue sur notre plateforme de gestion de livres ! Ici, vous pouvez découvrir des livres, lire des critiques et, si vous êtes auteur.trice, publier vos propres œuvres.</p>

        <?php if ($userId) { ?>
            <article style="background-color: var(--pico-ins-color);">
                <p><strong>Vous êtes actuellement connecté.e</strong> :</p>
                <ul>
                    <li><strong>Email :</strong> <?= htmlspecialchars($email) ?></li>
                    <li><strong>Rôle :</strong> <?= htmlspecialchars($role === 'author' ? 'Auteur.trice' : 'Lecteur.trice') ?></li>
                </ul>
            </article>
        <?php } else { ?>
            <article>
                <p><strong>Vous n'êtes actuellement pas connecté.e.</strong></p>
                <p>Créez un compte ou connectez-vous pour accéder à plus de fonctionnalités !</p>
            </article>
        <?php } ?>

        <p>
            <a href="index.php">Retour à l'accueil</a>
            <?php if ($userId) { ?>
                | <a href="auth/logout.php">Se déconnecter</a>
            <?php } else { ?>
                | <a href="auth/login.php">Se connecter</a>
                | <a href="auth/register.php">Créer un compte</a>
            <?php } ?>
        </p>
    </main>
</body>

</html>
