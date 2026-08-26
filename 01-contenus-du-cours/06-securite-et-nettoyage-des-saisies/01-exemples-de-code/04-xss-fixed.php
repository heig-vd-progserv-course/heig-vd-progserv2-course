<?php
// Constante pour le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . "/users.db";

// Connexion à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// On prépare la requête SQL pour récupérer tous les utilisateurs
$sql = "SELECT * FROM users";

// On exécute la requête SQL pour récupérer les utilisateurs
$users = $pdo->query($sql);

// On transforme le résultat en tableau
$users = $users->fetchAll();
?>

<!-- Gère l'affichage du formulaire -->
<!DOCTYPE html>
<html>

<head>
    <title>Comptes utilisateurs</title>
</head>

<body>
    <h1>Comptes utilisateurs</h1>

    <a href="03-sql-injection-fixed.php"><button>Créer un compte</button></a>

    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?= htmlspecialchars($user["email"]) ?></li>
        <?php } ?>
    </ul>
</body>

</html>
