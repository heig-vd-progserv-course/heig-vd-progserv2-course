<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Users\UsersManager;

// Création d'une instance de UsersManager
$usersManager = new UsersManager();

// Récupération de tous les utilisateurs
$users = $usersManager->getUsers();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <title>Gestion des utilisateur.trices | MyApp</title>
</head>

<body>
    <main class="container">
        <h1>Gestion des utilisateur.trices</h1>

        <p><a href="../index.php">Accueil</a> > Gestion des utilisateur.trices</p>

        <h2>Liste des utilisateur.trices</h2>

        <p><a href="create.php"><button>Créer un.e nouvel.le utilisateur.trice</button></a></p>

        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Âge</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= htmlspecialchars($user['first_name']) ?></td>
                        <td><?= htmlspecialchars($user['last_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['age']) ?></td>
                        <td>
                            <a href="delete.php?id=<?= htmlspecialchars($user['id']) ?>"><button>Supprimer</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>
