<?php
// Constante pour le fichier de base de données SQLite
const DATABASE_FILE = __DIR__ . "/users.db";

// Connexion à la base de données
$pdo = new PDO("sqlite:" . DATABASE_FILE);

// Création d'une table `users`
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)";

// On exécute la requête SQL pour créer la table
$pdo->exec($sql);

// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // On récupère les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // On prépare la requête SQL pour ajouter un utilisateur
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    // On prépare la requête
    $stmt = $pdo->prepare($sql);

    // On lie les paramètres
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    // On exécute la requête SQL pour ajouter l'utilisateur
    $stmt->execute();
}
?>

<!-- Gère l'affichage du formulaire -->
<!DOCTYPE html>
<html>

<head>
    <title>Création d'un compte</title>
</head>

<body>
    <h1>Création d'un compte</h1>

    <a href="04-xss-fixed.php"><button>Voir les comptes</button></a>

    <form action="03-sql-injection-fixed.php" method="POST">
        <label for="email">E-mail :</label><br>
        <input
            type="text"
            id="email"
            name="email" />

        <br>

        <label for="password">Mot de passe :</label><br>
        <input
            type="password"
            id="password"
            name="password" />

        <br>

        <button type="submit">Envoyer</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <p>Le formulaire a été soumis avec succès.</p>
    <?php } ?>
</body>

</html>
