<?php
// Démarre la session
session_start();

// Vérifie si l'utilisateur est connecté
$userId = $_SESSION['user_id'] ?? null;
$email = $_SESSION['email'] ?? null;
$role = $_SESSION['role'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Accueil | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Gestion de livres</h1>

        <p>Cette application permet de gérer des livres avec authentification et autorisation.</p>

        <?php if ($userId): ?>
            <article style="background-color: var(--pico-ins-color);">
                <p><strong>Vous êtes connecté.e</strong> :</p>
                <ul>
                    <li><strong>Email :</strong> <?= htmlspecialchars($email) ?></li>
                    <li><strong>Rôle :</strong> <?= htmlspecialchars($role === 'author' ? 'Auteur.trice' : 'Lecteur.trice') ?></li>
                </ul>
            </article>
        <?php else: ?>
            <p>Commencez par accéder à la page <a href="debug/init-db.php"><code>debug/init-db.php</code></a> pour initialiser la base de données avec des utilisateurs de test.</p>
        <?php endif; ?>

        <h2>Pages publiques</h2>
        <ul>
            <li><a href="debug/init-db.php"><code>debug/init-db.php</code></a> - Page d'initialisation de la base de données (<strong>uniquement à des fins de tests</strong>)</li>
            <li><a href="auth/register.php"><code>auth/register.php</code></a> - Créer un compte</li>
            <li><a href="auth/login.php"><code>auth/login.php</code></a> - Se connecter</li>
            <li><a href="public.php"><code>public.php</code></a> - Page publique</li>
        </ul>

        <h2>Pages protégées</h2>
        <ul>
            <li><a href="private.php"><code>private.php</code></a> - Page privée (accessible aux personnes connectées)</li>
            <li><a href="author.php"><code>author.php</code></a> - Page auteur (accessible aux auteur.trice.s uniquement)</li>
            <?php if ($userId): ?>
                <li><a href="auth/logout.php"><code>auth/logout.php</code></a> - Se déconnecter</li>
            <?php endif; ?>
        </ul>
    </main>
</body>

</html>
