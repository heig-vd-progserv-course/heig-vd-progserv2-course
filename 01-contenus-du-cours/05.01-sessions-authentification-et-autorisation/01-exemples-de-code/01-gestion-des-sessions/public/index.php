<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Accueil | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Gestion des sessions en PHP</h1>

        <p>Cette application permet de gérer les sessions utilisateur avec authentification et autorisation.</p>
        <p>Commencez par accéder à la page <a href="debug/init-db.php"><code>debug/init-db.php</code></a> pour initialiser la base de données avec des utilisateurs de test.</p>

        <h2>Pages publiques</h2>
        <ul>
            <li><a href="debug/init-db.php"><code>debug/init-db.php</code></a> - Page d'initialisation de la base de données (<strong>uniquement à des fins de tests</strong>)</li>
            <li><a href="auth/register.php"><code>auth/register.php</code></a> - Créer un compte</li>
            <li><a href="auth/login.php"><code>auth/login.php</code></a> - Se connecter</li>
            <li><a href="public.php"><code>public.php</code></a> - Page publique</li>
        </ul>

        <h2>Pages protégées</h2>
        <ul>
            <li><a href="private.php"><code>private.php</code></a> - Page privée</li>
            <li><a href="admin.php"><code>admin.php</code></a> - Page administrateur</li>
            <li><a href="auth/logout.php"><code>auth/logout.php</code></a> - Se déconnecter</li>
        </ul>
    </main>
</body>

</html>
