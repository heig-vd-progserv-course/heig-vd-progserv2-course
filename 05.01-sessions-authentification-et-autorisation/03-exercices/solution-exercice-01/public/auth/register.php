<?php<?php<?php

// Constantes

const DATABASE_FILE = __DIR__ . '/../../books.db';// Constantes// Constantes



// Démarre la sessionconst DATABASE_FILE = __DIR__ . '/../../books.db';const DATABASE_FILE = __DIR__ . '/../../users.db';

session_start();



// Initialise les variables

$error = '';// Démarre la session// Démarre la session

$success = '';

session_start();session_start();

// Traiter le formulaire d'inscription

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';

    $password = $_POST['password'] ?? '';// Initialise les variables// Initialise les variables

    $confirmPassword = $_POST['confirm_password'] ?? '';

    $role = $_POST['role'] ?? 'reader';$error = '';$error = '';



    // Validation des données$success = '';$success = '';

    if (empty($email) || empty($password) || empty($confirmPassword)) {

        $error = 'Tous les champs sont obligatoires.';

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = 'L\'adresse email n\'est pas valide.';// Traiter le formulaire d'inscription// Traiter le formulaire d'inscription

    } elseif ($password !== $confirmPassword) {

        $error = 'Les mots de passe ne correspondent pas.';if ($_SERVER['REQUEST_METHOD'] === 'POST') {if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    } elseif (strlen($password) < 8) {

        $error = 'Le mot de passe doit contenir au moins 8 caractères.';    $email = $_POST['email'] ?? '';    $username = $_POST['username'] ?? '';

    } elseif (!in_array($role, ['reader', 'author'])) {

        $error = 'Le rôle sélectionné n\'est pas valide.';    $password = $_POST['password'] ?? '';    $password = $_POST['password'] ?? '';

    } else {

        try {    $confirmPassword = $_POST['confirm_password'] ?? '';    $confirmPassword = $_POST['confirm_password'] ?? '';

            // Connexion à la base de données

            $pdo = new PDO('sqlite:' . DATABASE_FILE);    $role = $_POST['role'] ?? 'reader';



            // Vérifier si l'utilisateur existe déjà    // Validation des données

            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

            $stmt->execute(['email' => $email]);    // Validation des données    if (empty($username) || empty($password) || empty($confirmPassword)) {

            $user = $stmt->fetch();

    if (empty($email) || empty($password) || empty($confirmPassword)) {        $error = 'Tous les champs sont obligatoires.';

            if ($user) {

                $error = 'Cette adresse email est déjà utilisée.';        $error = 'Tous les champs sont obligatoires.';    } elseif ($password !== $confirmPassword) {

            } else {

                // Hacher le mot de passe    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {        $error = 'Les mots de passe ne correspondent pas.';

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $error = 'L\'adresse email n\'est pas valide.';    } elseif (strlen($password) < 8) {

                // Insérer le nouvel utilisateur

                $stmt = $pdo->prepare('INSERT INTO users (email, password, role) VALUES (:email, :password, :role)');    } elseif ($password !== $confirmPassword) {        $error = 'Le mot de passe doit contenir au moins 8 caractères.';

                $stmt->execute([

                    'email' => $email,        $error = 'Les mots de passe ne correspondent pas.';    } else {

                    'password' => $hashedPassword,

                    'role' => $role    } elseif (strlen($password) < 8) {        try {

                ]);

        $error = 'Le mot de passe doit contenir au moins 8 caractères.';            // Connexion à la base de données

                $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';

            }    } elseif (!in_array($role, ['reader', 'author'])) {            $pdo = new PDO('sqlite:' . DATABASE_FILE);

        } catch (PDOException $e) {

            $error = 'Erreur lors de la création du compte : ' . $e->getMessage();        $error = 'Le rôle sélectionné n\'est pas valide.';

        }

    }    } else {            // Vérifier si l'utilisateur existe déjà

}

?>        try {            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');

<!DOCTYPE html>

<html lang="fr">            // Connexion à la base de données            $stmt->execute(['username' => $username]);



<head>            $pdo = new PDO('sqlite:' . DATABASE_FILE);            $user = $stmt->fetch();

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title>Créer un compte | Gestion de livres</title>            // Vérifier si l'utilisateur existe déjà            if ($user) {

</head>

            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');                $error = 'Ce nom d\'utilisateur est déjà pris.';

<body>

    <main class="container">            $stmt->execute(['email' => $email]);            } else {

        <h1>Créer un compte</h1>

            $user = $stmt->fetch();                // Hacher le mot de passe

        <?php if ($error) { ?>

            <article style="background-color: var(--pico-del-color);">                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>

            </article>            if ($user) {

        <?php } ?>

                $error = 'Cette adresse email est déjà utilisée.';                // Insérer le nouvel utilisateur

        <?php if ($success) { ?>

            <article style="background-color: var(--pico-ins-color);">            } else {                $stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');

                <p><strong>Succès :</strong> <?= htmlspecialchars($success) ?></p>

            </article>                // Hacher le mot de passe                $stmt->execute([

            <p><a href="login.php">Se connecter maintenant</a></p>

        <?php } else { ?>                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);                    'username' => $username,

            <form method="post">

                <label for="email">                    'password' => $hashedPassword,

                    Adresse email

                    <input type="email" id="email" name="email" required autofocus                 // Insérer le nouvel utilisateur                    'role' => 'user' // Par défaut, les nouveaux utilisateurs ont le rôle "user"

                           placeholder="exemple@email.com">

                </label>                $stmt = $pdo->prepare('INSERT INTO users (email, password, role) VALUES (:email, :password, :role)');                ]);



                <label for="password">                $stmt->execute([

                    Mot de passe (min. 8 caractères)

                    <input type="password" id="password" name="password" required minlength="8">                    'email' => $email,                $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';

                </label>

                    'password' => $hashedPassword,            }

                <label for="confirm_password">

                    Confirmer le mot de passe                    'role' => $role        } catch (PDOException $e) {

                    <input type="password" id="confirm_password" name="confirm_password" required minlength="8">

                </label>                ]);            $error = 'Erreur lors de la création du compte : ' . $e->getMessage();



                <fieldset>        }

                    <legend>Rôle</legend>

                    <label>                $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';    }

                        <input type="radio" name="role" value="reader" checked>

                        Lecteur.trice            }}

                    </label>

                    <label>        } catch (PDOException $e) {?>

                        <input type="radio" name="role" value="author">

                        Auteur.trice            $error = 'Erreur lors de la création du compte : ' . $e->getMessage();<!DOCTYPE html>

                    </label>

                </fieldset>        }<html lang="fr">



                <button type="submit">Créer mon compte</button>    }

            </form>

}<head>

            <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>

        <?php } ?>?>    <meta charset="utf-8">



        <p><a href="../index.php">Retour à l'accueil</a></p><!DOCTYPE html>    <meta name="viewport" content="width=device-width, initial-scale=1">

    </main>

</body><html lang="fr">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">



</html>    <title>Créer un compte | Gestion des sessions</title>


<head></head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1"><body>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">    <main class="container">

    <title>Créer un compte | Gestion de livres</title>        <h1>Créer un compte</h1>

</head>

        <?php if ($error) { ?>

<body>            <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>

    <main class="container">        <?php } ?>

        <h1>Créer un compte</h1>

        <?php if ($success) { ?>

        <?php if ($error) { ?>            <p><strong>Succès :</strong> <?= htmlspecialchars($success) ?></p>

            <article style="background-color: var(--pico-del-color);">            <p><a href="login.php">Se connecter maintenant</a></p>

                <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>        <?php } ?>

            </article>

        <?php } ?>        <form method="post">

            <label for="username">

        <?php if ($success) { ?>                Nom d'utilisateur

            <article style="background-color: var(--pico-ins-color);">                <input type="text" id="username" name="username" required autofocus>

                <p><strong>Succès :</strong> <?= htmlspecialchars($success) ?></p>            </label>

            </article>

            <p><a href="login.php">Se connecter maintenant</a></p>            <label for="password">

        <?php } else { ?>                Mot de passe (min. 8 caractères)

            <form method="post">                <input type="password" id="password" name="password" required minlength="8">

                <label for="email">            </label>

                    Adresse email

                    <input type="email" id="email" name="email" required autofocus             <label for="confirm_password">

                           placeholder="exemple@email.com">                Confirmer le mot de passe

                </label>                <input type="password" id="confirm_password" name="confirm_password" required minlength="8">

            </label>

                <label for="password">

                    Mot de passe (min. 8 caractères)            <button type="submit">Créer mon compte</button>

                    <input type="password" id="password" name="password" required minlength="8">        </form>

                </label>

        <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>

                <label for="confirm_password">

                    Confirmer le mot de passe        <p><a href="index.php">Retour à l'accueil</a></p>

                    <input type="password" id="confirm_password" name="confirm_password" required minlength="8">    </main>

                </label></body>



                <fieldset></html>

                    <legend>Rôle</legend>
                    <label>
                        <input type="radio" name="role" value="reader" checked>
                        Lecteur.trice
                    </label>
                    <label>
                        <input type="radio" name="role" value="author">
                        Auteur.trice
                    </label>
                </fieldset>

                <button type="submit">Créer mon compte</button>
            </form>

            <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
        <?php } ?>

        <p><a href="../index.php">Retour à l'accueil</a></p>
    </main>
</body>

</html>
