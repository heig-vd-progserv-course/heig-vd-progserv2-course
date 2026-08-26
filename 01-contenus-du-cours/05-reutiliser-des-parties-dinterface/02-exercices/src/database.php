<?php
// Chemin vers le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . '/../petsmanager.db';

// Création d'une instance de PDO pour se connecter à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// On définit la requête SQL pour créer la table `pets` si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS pets (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    species TEXT NOT NULL,
    sex TEXT NOT NULL,
    birthday DATE NOT NULL
);";

// On prépare la requête SQL
$stmt = $pdo->prepare($sql);

// On exécute la requête SQL
$stmt->execute();
