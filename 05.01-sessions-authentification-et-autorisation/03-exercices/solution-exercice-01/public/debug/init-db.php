<?php
const DATABASE_FILE = __DIR__ . '/../../books.db';

// Crée une connexion à la base de données SQLite
$pdo = new PDO('sqlite:' . DATABASE_FILE);

// Crée la table `users` si elle n'existe pas
$pdo->exec('
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            role TEXT NOT NULL DEFAULT "reader" -- "reader" ou "author"
        )
    ');

echo "<a href='../index.php'>Retour à l'accueil</a>";
