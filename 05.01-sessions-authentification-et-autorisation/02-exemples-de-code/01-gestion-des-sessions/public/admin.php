<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: auth/login.php');
    exit();
}

// Vérifier si l'utilisateur a le rôle d'administrateur
if ($_SESSION['role'] !== 'admin') {
    // Refuser l'accès et afficher un message d'erreur
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

            <article style="background-color: var(--pico-del-color);">
                <p><strong>✗ Vous n'avez pas les droits nécessaires pour accéder à cette page.</strong></p>
                <p>Cette page est réservée aux administrateurs uniquement.</p>
            </article>

            <p>Vous êtes connecté en tant que <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> avec le rôle <strong><?= htmlspecialchars($_SESSION['role']) ?></strong>.</p>

            <h2>Comment ça fonctionne ?</h2>

            <p>Cette page vérifie d'abord si l'utilisateur est authentifié, puis contrôle son rôle.</p>
            <p>Si le rôle n'est pas "admin", l'accès est refusé avec un code HTTP 403 (Forbidden).</p>

            <details>
                <summary>Voir le code source</summary>
                <pre><code>&lt;?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Vérifier le rôle de l'utilisateur
if ($_SESSION['role'] !== 'admin') {
    // Refuser l'accès
    http_response_code(403);
    // Afficher un message d'erreur
    exit();
}

// L'utilisateur est un administrateur, la page peut être affichée
?&gt;</code></pre>
            </details>

            <p><a href="index.php">Retour à l'accueil</a></p>
        </main>
    </body>

    </html>
<?php
    exit();
}

// L'utilisateur est un administrateur, afficher la page
$username = $_SESSION['username'];

// Récupérer la liste de tous les utilisateurs (fonctionnalité d'administration)
try {
    $pdo = new PDO('sqlite:users.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT id, username, role FROM users ORDER BY id');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $users = [];
    $error = 'Erreur lors de la récupération des utilisateurs : ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Page administrateur | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Page administrateur</h1>

        <article style="background-color: var(--pico-ins-color);">
            <p><strong>✓ Vous avez accès à cette page !</strong></p>
            <p>Cette page est accessible uniquement aux administrateurs.</p>
        </article>

        <p>Bienvenue, <strong><?= htmlspecialchars($username) ?></strong> !</p>

        <h2>Gestion des utilisateurs</h2>

        <?php if (isset($error)): ?>
            <article style="background-color: var(--pico-del-color);">
                <p><?= htmlspecialchars($error) ?></p>
            </article>
        <?php else: ?>
            <figure>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'utilisateur</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= htmlspecialchars($user['role']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </figure>
        <?php endif; ?>

        <h2>Comment ça fonctionne ?</h2>

        <p>Cette page effectue deux vérifications :</p>
        <ol>
            <li><strong>Authentification</strong> : L'utilisateur doit être connecté (vérification de <code>$_SESSION['user_id']</code>)</li>
            <li><strong>Autorisation</strong> : L'utilisateur doit avoir le rôle "admin" (vérification de <code>$_SESSION['role']</code>)</li>
        </ol>

        <p>Si l'une de ces conditions n'est pas remplie, l'accès est refusé.</p>

        <details>
            <summary>Voir le code source</summary>
            <pre><code>&lt;?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Vérifier le rôle de l'utilisateur
if ($_SESSION['role'] !== 'admin') {
    http_response_code(403);
    // Afficher un message d'erreur
    exit();
}

// L'utilisateur est un administrateur
// Le contenu de la page peut être affiché
?&gt;</code></pre>
        </details>

        <p><a href="index.php">Retour à l'accueil</a> | <a href="logout.php">Se déconnecter</a></p>
    </main>
</body>

</html>
