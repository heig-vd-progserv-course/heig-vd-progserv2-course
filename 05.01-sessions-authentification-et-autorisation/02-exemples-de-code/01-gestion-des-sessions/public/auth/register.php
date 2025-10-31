<?php
// Constantes
const DATABASE_FILE = __DIR__ . '/../../users.db';

// Démarre la session
session_start();

// Initialise les variables
$error = '';
$success = '';

// Traiter le formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Validation des données
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $error = 'Tous les champs sont obligatoires.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Les mots de passe ne correspondent pas.';
    } elseif (strlen($password) < 8) {
        $error = 'Le mot de passe doit contenir au moins 8 caractères.';
    } else {
        try {
            // Connexion à la base de données
            $pdo = new PDO('sqlite:' . DATABASE_FILE);

            // Vérifier si l'utilisateur existe déjà
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user) {
                $error = 'Ce nom d\'utilisateur est déjà pris.';
            } else {
                // Hacher le mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insérer le nouvel utilisateur
                $stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
                $stmt->execute([
                    'username' => $username,
                    'password' => $hashedPassword,
                    'role' => 'user' // Par défaut, les nouveaux utilisateurs ont le rôle "user"
                ]);

                $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';
            }
        } catch (PDOException $e) {
            $error = 'Erreur lors de la création du compte : ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Créer un compte | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Créer un compte</h1>

        <?php if ($error) { ?>
            <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
        <?php } ?>

        <?php if ($success) { ?>
            <p><strong>Succès :</strong> <?= htmlspecialchars($success) ?></p>
            <p><a href="login.php">Se connecter maintenant</a></p>
        <?php } ?>

        <form method="post">
            <label for="username">
                Nom d'utilisateur
                <input type="text" id="username" name="username" required autofocus>
            </label>

            <label for="password">
                Mot de passe (min. 8 caractères)
                <input type="password" id="password" name="password" required minlength="8">
            </label>

            <label for="confirm_password">
                Confirmer le mot de passe
                <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
            </label>

            <button type="submit">Créer mon compte</button>
        </form>

        <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>

        <p><a href="index.php">Retour à l'accueil</a></p>
    </main>
</body>

</html>
