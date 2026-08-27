<?php
// Connexion à la base de données MySQL
const DB_HOST = 'mariadb';
const DB_PORT = 3306;
const DB_NAME = 'my_database';
const DB_USER = 'username';
const DB_PASSWORD = 'password';

$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

// Création de la base de données si elle n'existe pas
$sql = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Sélection de la base de données
$sql = "USE `" . DB_NAME . "`;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Création de la table `users` si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    age INT NOT NULL
);";

$stmt = $pdo->prepare($sql);

$stmt->execute();

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

        <p><a href="./create.php"><button>Créer un.e nouvel.le utilisateur.trice</button></a></p>

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
