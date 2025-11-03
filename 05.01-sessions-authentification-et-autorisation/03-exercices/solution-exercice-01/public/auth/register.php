<?php
// Constantes
const DATABASE_FILE = __DIR__ . '/../../books.db';

// Démarre la session
session_start();

// Initialise les variables
$error = '';
$success = '';

// Traiter le formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Validation des données
    if (empty($email) || empty($password) || empty($confirmPassword)) {
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
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                $error = 'Cet e-mail est déjà pris.';
            } else {
                // Hacher le mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insérer le nouvel utilisateur
                $stmt = $pdo->prepare('INSERT INTO users (email, password, role) VALUES (:email, :password, :role)');
                $stmt->execute([
                    'email' => $email,
                    'role' => $role,
                    'password' => $hashedPassword
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
    <title>Créer un compte | Gestion de livres</title>
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
            <label for="email">
                E-mail
                <input type="email" id="email" name="email" required autofocus>
            </label>

            <label for="role">
                Rôle
                <select id="role" name="role" required>
                    <option value="user">Lecteur.trice</option>
                    <option value="author">Auteur.trice</option>
                </select>
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
