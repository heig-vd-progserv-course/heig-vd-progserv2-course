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
    // Redirige vers la page 403 si l'utilisateur n'est pas auteur.trice
    header('Location: 403.php');
    exit();
}

// Sinon, récupère les autres informations de l'utilisateur
$email = $_SESSION['email'];
$role = $_SESSION['role'];

// Récupère la liste de tous les utilisateurs (fonctionnalité réservée aux auteur.trice.s)
try {
    $pdo = new PDO('sqlite:' . DATABASE_FILE);

    $stmt = $pdo->query('SELECT * FROM users ORDER BY id');
    $users = $stmt->fetchAll();
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
    <title>Espace auteur | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Espace auteur</h1>

        <article style="background-color: var(--pico-ins-color);">
            <p><strong>✓ Bienvenue dans votre espace auteur.trice !</strong></p>
            <p>Cette page est accessible uniquement aux auteur.trice.s.</p>
        </article>

        <p>Bonjour, <strong><?= htmlspecialchars($email) ?></strong> !</p>

        <h2>Fonctionnalités auteur</h2>

        <p>En tant qu'auteur.trice, vous avez accès à des fonctionnalités exclusives pour gérer vos livres et interagir avec vos lecteur.trice.s.</p>

        <h3>Statistiques</h3>
        <p>Cette section permettrait de consulter :</p>
        <ul>
            <li>Le nombre de livres publiés</li>
            <li>Le nombre de lecteur.trice.s</li>
            <li>Les critiques récentes</li>
        </ul>

        <h2>Liste des utilisateurs inscrits</h2>

        <?php if (isset($error)) { ?>
            <article style="background-color: var(--pico-del-color);">
                <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
            </article>
        <?php } else { ?>
            <figure>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['role'] === 'author' ? 'Auteur.trice' : 'Lecteur.trice') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </figure>
        <?php } ?>

        <p><a href="index.php">Retour à l'accueil</a> | <a href="auth/logout.php">Se déconnecter</a></p>
    </main>
</body>

</html>
