<?php
// Constantes
const DATABASE_FILE = __DIR__ . '/../../users.db';

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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation des données
    if (empty($username) || empty($password)) {
        $error = 'Tous les champs sont obligatoires.';
    } else {
        try {
            // Connexion à la base de données
            $pdo = new PDO('sqlite:' . DATABASE_FILE);

            // Récupérer l'utilisateur de la base de données
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            // Vérifier le mot de passe
            if ($user && password_verify($password, $user['password'])) {
                // Authentification réussie - stocker les informations dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Rediriger vers la page d'accueil
                header('Location: ../index.php');
                exit();
            } else {
                // Authentification échouée
                $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
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
    <title>Se connecter | Gestion des sessions</title>
</head>

<body>
    <main class="container">
        <h1>Se connecter</h1>

        <?php if ($error) { ?>
            <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
        <?php } ?>

        <form method="post">
            <label for="username">
                Nom d'utilisateur
                <input type="text" id="username" name="username" required autofocus>
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
