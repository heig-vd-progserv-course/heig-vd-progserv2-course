<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Users\UsersManager;
use Users\User;

// Création d'une instance de UsersManager
$usersManager = new UsersManager();

// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    $errors = [];

    try {
        // Création d'un nouvel objet `User`
        $user = new User(
            null, // Comme c'est une création, l'ID est null. La base de données l'assignera automatiquement.
            $firstName,
            $lastName,
            $email,
            $age
        );
    } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
    }

    // S'il n'y a pas d'erreurs, ajout de l'utilisateur
    if (empty($errors)) {
        try {
            // Ajout de l'utilisateur à la base de données
            $usersManager->addUser($user);

            // Redirection vers la page d'accueil avec tous les utilisateurs
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            // Liste des codes d'erreurs : https://en.wikipedia.org/wiki/SQLSTATE
            if ($e->getCode() === 23000) {
                // Erreur de contrainte d'unicité (par exemple, email déjà utilisé)
                $errors[] = "L'adresse e-mail est déjà utilisée.";
            } else {
                $errors[] = "Erreur lors de l'interaction avec la base de données : " . $e->getMessage();
            }
        } catch (Exception $e) {
            $errors[] = "Erreur inattendue : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <title>Créer un.e nouvel.le utilisateur.trice | MyApp</title>
</head>

<body>
    <main class="container">
        <h1>Créer un.e nouvel.le utilisateur.trice</h1>

        <p><a href="../index.php">Accueil</a> > <a href="index.php">Gestion des utilisateur.trices</a> > Création d'un.e utilisateur.trice</p>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
            <?php if (empty($errors)) { ?>
                <p style="color: green;">Le formulaire a été soumis avec succès !</p>
            <?php } else { ?>
                <p style="color: red;">Le formulaire contient des erreurs :</p>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>

        <form action="create.php" method="POST">
            <label for="first-name">Prénom</label>
            <input type="text" id="first-name" name="first-name" value="<?= htmlspecialchars($firstName ?? ''); ?>" required minlength="2">

            <label for="last-name">Nom</label>
            <input type="text" id="last-name" name="last-name" value="<?= htmlspecialchars($lastName ?? ''); ?>" required minlength="2">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? ''); ?>" required>

            <label for="age">Âge</label>
            <input type="number" id="age" name="age" value="<?= htmlspecialchars($age ?? ''); ?>" required min="0">

            <button type="submit">Créer</button>
        </form>
    </main>
</body>

</html>
