<?php
// Constantes
const DATABASE_FILE = __DIR__ . '/../../books.db';

// Démarre la session
session_start();

// Si l'utilisateur est déjà connecté, le rediriger vers l'accueil
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Initialise les variables
$error = '';

// Traite le formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation des données
    if (empty($email) || empty($password)) {
        $error = 'Tous les champs sont obligatoires.';
    } else {
        try {
            // Connexion à la base de données
            $pdo = new PDO('sqlite:' . DATABASE_FILE);

            // Récupérer l'utilisateur de la base de données
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            // Vérifier le mot de passe
            if ($user && password_verify($password, $user['password'])) {
                // Authentification réussie - stocker les informations dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                // Rediriger vers la page d'accueil
                header('Location: ../index.php');
                exit();
            } else {
                // Authentification échouée
                $error = 'E-mail ou mot de passe incorrect.';
            }
        } catch (PDOException $e) {
            $error = 'Erreur lors de la connexion : ' . $e->getMessage();
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
    <title>Se connecter | Gestion de livres</title>
</head>

<body>
    <main class="container">
        <h1>Se connecter</h1>

        <?php if ($error) { ?>
            <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
        <?php } ?>

        <form method="post">
            <label for="email">
                E-mail
                <input type="email" id="email" name="email" required autofocus>
            </label>

            <label for="password">
                Mot de passe
                <input type="password" id="password" name="password" required>
            </label>

            <button type="submit">Se connecter</button>
        </form>

        <p>Pas encore de compte ? <a href="register.php">Créer un compte</a></p>

        <p><a href="../index.php">Retour à l'accueil</a></p>
    </main>
</body>

</html>
