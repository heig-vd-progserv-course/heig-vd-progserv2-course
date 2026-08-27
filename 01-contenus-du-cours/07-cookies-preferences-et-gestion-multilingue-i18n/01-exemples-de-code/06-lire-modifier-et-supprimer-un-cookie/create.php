<?php
// Constantes
const COOKIE_NAME = 'my_cookie';
const COOKIE_LIFETIME = 30; // 30 secondes

// Crée le cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère la valeur du formulaire ou génère une valeur aléatoire
    $cookieValue = empty($_POST['value']) ? random_int(1, 100) : $_POST['value'];

    setcookie(COOKIE_NAME, $cookieValue, time() + COOKIE_LIFETIME);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Créer un cookie</title>
</head>

<body>
    <h1>Créer un cookie</h1>
    <p>Le cookie créé aura une durée de vie de 30 secondes.</p>
    <p>Après 30 secondes, le cookie expirera et ne sera plus accessible.</p>
    <form method="post">
        <label for="value">Valeur du cookie (laissez vide pour une valeur aléatoire entre 1 et 100) :</label>
        <input type="text" name="value" id="value">
        <button type="submit">Créer le cookie</button>
    </form>
    <nav>
        <a href="index.php">Lire le cookie</a>
    </nav>
</body>

</html>
