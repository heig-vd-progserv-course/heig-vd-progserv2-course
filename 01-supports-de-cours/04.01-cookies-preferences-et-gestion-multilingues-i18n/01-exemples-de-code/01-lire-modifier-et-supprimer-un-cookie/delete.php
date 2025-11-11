<?php
// Constantes
const COOKIE_NAME = 'my_cookie';

// Supprime le cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie(COOKIE_NAME, '');
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Supprimer un cookie</title>
</head>

<body>
    <h1>Supprimer un cookie</h1>
    <form method="post">
        <button type="submit">Supprimer le cookie</button>
    </form>
    <nav>
        <a href="index.php">Lire le cookie</a>
    </nav>
</body>

</html>
