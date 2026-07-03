<?php
// Constantes
const COOKIE_NAME = 'my_cookie';

// Lire la valeur du cookie
$cookie_value = $_COOKIE[COOKIE_NAME] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Lire un cookie</title>
</head>

<body>
    <h1>Lire un cookie</h1>
    <p>Le cookie créé aura une durée de vie de 30 secondes.</p>
    <p>Après 30 secondes, le cookie expirera et ne sera plus accessible.</p>
    <?php if ($cookie_value): ?>
        <p>Valeur du cookie : <strong><?= htmlspecialchars($cookie_value) ?></strong></p>
    <?php else: ?>
        <p>Le cookie <strong><?= COOKIE_NAME ?></strong> n'existe pas.</p>
    <?php endif; ?>
    <nav>
        <a href="create.php">Créer le cookie</a> |
        <a href="update.php">Modifier le cookie</a> |
        <a href="delete.php">Supprimer le cookie</a>
    </nav>
</body>

</html>
