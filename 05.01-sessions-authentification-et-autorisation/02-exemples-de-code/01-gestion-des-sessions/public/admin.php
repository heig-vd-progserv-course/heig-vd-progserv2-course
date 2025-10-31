<?php
// Constantes
const DATABASE_FILE = __DIR__ . '/../users.db';

// Démarre la session
session_start();

// Vérifie si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: auth/login.php');
    exit();
}

// Vérifie si l'utilisateur a le bon rôle
if ($_SESSION['role'] !== 'admin') {
    // Redirige vers la page 403 si l'utilisateur n'est pas admin
    header('Location: 403.php');
    exit();
}

// Sinon, récupère les autres informations de l'utilisateur
$username = $_SESSION['username'];
$role = $_SESSION['role'];

// Récupère la liste de tous les utilisateurs (fonctionnalité d'administration)
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
    <title>Page administrateur | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Page administrateur</h1>

        <p>Cette page est accessible uniquement aux administrateurs.</p>

        <h2>Gestion des utilisateurs</h2>

        <?php if (isset($error)) { ?>
            <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
        <?php } ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p><a href="index.php">Retour à l'accueil</a> | <a href="./auth/logout.php">Se déconnecter</a></p>
    </main>
</body>

</html>
