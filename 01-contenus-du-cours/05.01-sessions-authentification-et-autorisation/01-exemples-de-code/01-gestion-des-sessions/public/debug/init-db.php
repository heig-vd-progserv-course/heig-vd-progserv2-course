<?php
// Constantes
const USER_1_NAME = 'user';
const USER_1_PASSWORD = 'password123';

const USER_2_NAME = 'admin';
const USER_2_PASSWORD = 'password123';

const DATABASE_FILE = __DIR__ . '/../../users.db';

// Crée une connexion à la base de données SQLite
$pdo = new PDO('sqlite:' . DATABASE_FILE);

// Crée la table `users` si elle n'existe pas
$pdo->exec('
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            role TEXT NOT NULL DEFAULT "user" -- "user" ou "admin"
        )
    ');

// Compte le nombre d'utilisateurs existants
$stmt = $pdo->query('SELECT COUNT(*) as count FROM users');
$query = $stmt->fetch();

// Vérifie si des utilisateurs existent déjà, sinon crée des utilisateurs de test
if ($query['count'] === 0) {
    // Prépare la requête d'insertion
    $stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');

    // Utilisateur normal
    $user1hashedPassword = password_hash(USER_1_PASSWORD, PASSWORD_DEFAULT);
    $stmt->execute([
        'username' => USER_1_NAME,
        'password' => $user1hashedPassword,
        'role' => 'user'
    ]);

    // Administrateur
    $user2hashedPassword = password_hash(USER_2_PASSWORD, PASSWORD_DEFAULT);
    $stmt->execute([
        'username' => USER_2_NAME,
        'password' => $user2hashedPassword,
        'role' => 'admin'
    ]);

    echo "Base de données initialisée avec succès !<br>";
    echo "Utilisateurs créés :<br>";
    echo "- Utilisateur normal : " . USER_1_NAME . " / " . USER_1_PASSWORD . "<br>";
    echo "- Administrateur : " . USER_2_NAME . " / " . USER_2_PASSWORD . "<br>";
} else {
    echo "La base de données contient déjà des utilisateurs.<br>";
}

echo "<br><a href='../index.php'>Retour à l'accueil</a>";
