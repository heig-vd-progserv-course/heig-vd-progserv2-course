<?php
// Connexion à la base de données SQLite
const DATABASE_FILE = __DIR__ . '/mydatabase.db';

$pdo = new PDO("sqlite:" . DATABASE_FILE);

// Définition de la requête SQL pour récupérer tous les utilisateurs
$sql = "SELECT * FROM users";

// Préparation de la requête SQL
$stmt = $pdo->prepare($sql);

// Exécution de la requête SQL
$stmt->execute();

// Récupération de tous les utilisateurs
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title>Gestion des utilisateur.trices | MyApp</title>
</head>

<body>
    <main class="container">
        <h1>Gestion des utilisateur.trices</h1>

        <h2>Liste des utilisateur.trices</h2>

        <p><a href="07-validate-data-client-side.php"><button>Créer un.e nouvel.le utilisateur.trice</button></a></p>

        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Âge</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= htmlspecialchars($user['first_name']) ?></td>
                        <td><?= htmlspecialchars($user['last_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['age']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>
