<?php
// Fichier favorite-artists.php

// Constante pour le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . "/favorite-artists.db";

// Connexion à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// Création d'une table `favorite_artists`
$sql = "CREATE TABLE IF NOT EXISTS favorite_artists (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    band_name TEXT NOT NULL
)";

// On exécute la requête SQL pour créer la table
$pdo->exec($sql);

// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On récupère les données du formulaire
    $bandName = $_POST["band-name"];

    // On prépare la requête SQL pour ajouter un.e artiste favori.te
    $sql = "INSERT INTO favorite_artists (band_name) VALUES ('$bandName')";

    // On exécute la requête SQL pour ajouter l'artiste favori.te
    $pdo->exec($sql);
}

// On prépare la requête SQL pour récupérer tous les artistes favori.tes
$sql = "SELECT * FROM favorite_artists";

// On exécute la requête SQL pour récupérer les artistes favori.tes
$favoriteArtists = $pdo->query($sql);

// On transforme le résultat en tableau
$favoriteArtists = $favoriteArtists->fetchAll();
?>

<!-- Gère l'affichage du formulaire -->
<!DOCTYPE html>
<html>

<head>
    <title>Mes artistes favori.tes</title>
</head>

<body>
    <h1>Mes artistes favori.tes</h1>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <p>L'artiste favori.te a été rajouté.</p>
    <?php } ?>

    <ul>
        <?php foreach ($favoriteArtists as $favoriteArtist) { ?>
            <li><?= $favoriteArtist["band_name"] ?></li>
        <?php } ?>
    </ul>

    <h2>Ajouter un.e artiste favori.te</h2>

    <form action="./index.php" method="POST">
        <label for="band-name">Artiste</label><br>
        <input
            type="text"
            id="band-name"
            name="band-name" />

        <br>

        <button type="submit">Envoyer</button>
    </form>
</body>

</html>
