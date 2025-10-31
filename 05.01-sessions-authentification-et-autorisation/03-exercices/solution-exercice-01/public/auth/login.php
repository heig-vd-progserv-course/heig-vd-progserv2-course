<?php<?php<?php

// Constantes

const DATABASE_FILE = __DIR__ . '/../../books.db';// Constantes// Constantes



// Démarre la sessionconst DATABASE_FILE = __DIR__ . '/../../books.db';const DATABASE_FILE = __DIR__ . '/../../users.db';

session_start();



// Si l'utilisateur est déjà connecté, le rediriger vers l'accueil

if (isset($_SESSION['user_id'])) {// Démarre la session// Démarre la session

    header('Location: ../index.php');

    exit();session_start();session_start();

}



// Initialise les variables

$error = '';// Si l'utilisateur est déjà connecté, le rediriger vers l'accueil// Si l'utilisateur est déjà connecté, le rediriger vers l'accueil



// Traite le formulaire de connexionif (isset($_SESSION['user_id'])) {if (isset($_SESSION['user_id'])) {

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';    header('Location: ../index.php');    header('Location: ../index.php');

    $password = $_POST['password'] ?? '';

    exit();    exit();

    // Validation des données

    if (empty($email) || empty($password)) {}}

        $error = 'Tous les champs sont obligatoires.';

    } else {

        try {

            // Connexion à la base de données// Initialise les variables// Initialise les variables

            $pdo = new PDO('sqlite:' . DATABASE_FILE);

$error = '';$error = '';

            // Récupérer l'utilisateur de la base de données

            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

            $stmt->execute(['email' => $email]);

            $user = $stmt->fetch();// Traite le formulaire de connexion// Traite le formulaire de connexion



            // Vérifier le mot de passeif ($_SERVER['REQUEST_METHOD'] === 'POST') {if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($user && password_verify($password, $user['password'])) {

                // Authentification réussie - stocker les informations dans la session    $email = $_POST['email'] ?? '';    $username = $_POST['username'];

                $_SESSION['user_id'] = $user['id'];

                $_SESSION['email'] = $user['email'];    $password = $_POST['password'] ?? '';    $password = $_POST['password'];

                $_SESSION['role'] = $user['role'];



                // Rediriger vers la page d'accueil

                header('Location: ../index.php');    // Validation des données    // Validation des données

                exit();

            } else {    if (empty($email) || empty($password)) {    if (empty($username) || empty($password)) {

                // Authentification échouée

                $error = 'Adresse email ou mot de passe incorrect.';        $error = 'Tous les champs sont obligatoires.';        $error = 'Tous les champs sont obligatoires.';

            }

        } catch (PDOException $e) {    } else {    } else {

            $error = 'Erreur lors de la connexion : ' . $e->getMessage();

        }        try {        try {

    }

}            // Connexion à la base de données            // Connexion à la base de données

?>

<!DOCTYPE html>            $pdo = new PDO('sqlite:' . DATABASE_FILE);            $pdo = new PDO('sqlite:' . DATABASE_FILE);

<html lang="fr">



<head>

    <meta charset="utf-8">            // Récupérer l'utilisateur de la base de données            // Récupérer l'utilisateur de la base de données

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');

    <title>Se connecter | Gestion de livres</title>

</head>            $stmt->execute(['email' => $email]);            $stmt->execute(['username' => $username]);



<body>            $user = $stmt->fetch();            $user = $stmt->fetch();

    <main class="container">

        <h1>Se connecter</h1>



        <?php if ($error): ?>            // Vérifier le mot de passe            // Vérifier le mot de passe

            <article style="background-color: var(--pico-del-color);">

                <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>            if ($user && password_verify($password, $user['password'])) {            if ($user && password_verify($password, $user['password'])) {

            </article>

        <?php endif; ?>                // Authentification réussie - stocker les informations dans la session                // Authentification réussie - stocker les informations dans la session



        <form method="post">                $_SESSION['user_id'] = $user['id'];                $_SESSION['user_id'] = $user['id'];

            <label for="email">

                Adresse email                $_SESSION['email'] = $user['email'];                $_SESSION['username'] = $user['username'];

                <input type="email" id="email" name="email" required autofocus 

                       placeholder="exemple@email.com">                $_SESSION['role'] = $user['role'];                $_SESSION['role'] = $user['role'];

            </label>



            <label for="password">

                Mot de passe                // Rediriger vers la page d'accueil                // Rediriger vers la page d'accueil

                <input type="password" id="password" name="password" required>

            </label>                header('Location: ../index.php');                header('Location: ../index.php');



            <button type="submit">Se connecter</button>                exit();                exit();

        </form>

            } else {            } else {

        <p>Pas encore de compte ? <a href="register.php">Créer un compte</a></p>

                // Authentification échouée                // Authentification échouée

        <p><a href="../index.php">Retour à l'accueil</a></p>

                $error = 'Adresse email ou mot de passe incorrect.';                $error = 'Nom d\'utilisateur ou mot de passe incorrect.';

        <hr>

            }            }

        <details>

            <summary>Utilisateurs de test</summary>        } catch (PDOException $e) {        } catch (PDOException $e) {

            <p>Si vous avez exécuté le script d'initialisation, vous pouvez utiliser ces identifiants :</p>

            <ul>            $error = 'Erreur lors de la connexion : ' . $e->getMessage();            $error = 'Erreur lors de la connexion : ' . $e->getMessage();

                <li><strong>Lecteur.trice</strong> : reader@example.com / password123</li>

                <li><strong>Auteur.trice</strong> : author@example.com / password123</li>        }        }

            </ul>

            <p>Si la base de données n'existe pas encore, <a href="../debug/init-db.php">cliquez ici pour l'initialiser</a>.</p>    }    }

        </details>

    </main>}}

</body>

?>?>

</html>

<!DOCTYPE html><!DOCTYPE html>

<html lang="fr"><html lang="fr">



<head><head>

    <meta charset="utf-8">    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title>Se connecter | Gestion de livres</title>    <title>Se connecter | Gestion des sessions</title>

</head></head>



<body><body>

    <main class="container">    <main class="container">

        <h1>Se connecter</h1>        <h1>Se connecter</h1>



        <?php if ($error): ?>        <?php if ($error): ?>

            <article style="background-color: var(--pico-del-color);">            <article style="background-color: var(--pico-del-color);">

                <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>                <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>

            </article>            </article>

        <?php endif; ?>        <?php endif; ?>



        <form method="post">        <form method="post">

            <label for="email">            <label for="username">

                Adresse email                Nom d'utilisateur

                <input type="email" id="email" name="email" required autofocus                 <input type="text" id="username" name="username" required autofocus>

                       placeholder="exemple@email.com">            </label>

            </label>

            <label for="password">

            <label for="password">                Mot de passe

                Mot de passe                <input type="password" id="password" name="password" required>

                <input type="password" id="password" name="password" required>            </label>

            </label>

            <button type="submit">Se connecter</button>

            <button type="submit">Se connecter</button>        </form>

        </form>

        <p>Pas encore de compte ? <a href="register.php">Créer un compte</a></p>

        <p>Pas encore de compte ? <a href="register.php">Créer un compte</a></p>

        <p><a href="../index.php">Retour à l'accueil</a></p>

        <p><a href="../index.php">Retour à l'accueil</a></p>    </main>

</body>

        <hr>

</html>

        <details>
            <summary>Utilisateurs de test</summary>
            <p>Si vous avez exécuté le script d'initialisation, vous pouvez utiliser ces identifiants :</p>
            <ul>
                <li><strong>Lecteur.trice</strong> : reader@example.com / password123</li>
                <li><strong>Auteur.trice</strong> : author@example.com / password123</li>
            </ul>
            <p>Si la base de données n'existe pas encore, <a href="../debug/init-db.php">cliquez ici pour l'initialiser</a>.</p>
        </details>
    </main>
</body>

</html>
