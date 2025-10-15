<?php
// Constantes pour la gestion des cookies
const COOKIE_LIFETIME = 60 * 60 * 24 * 30; // 30 jours
const COOKIE_NAME = 'color';
const DEFAULT_COLOR = '#ffffff';

// Gestion de la suppression du cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_COOKIE[COOKIE_NAME])) {
    setcookie(COOKIE_NAME, '');

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Gestion de la soumission du formulaire de couleur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
    $color = $_POST['color'];

    setcookie(COOKIE_NAME, $color, time() + COOKIE_LIFETIME);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Récupération de la couleur depuis le cookie
$color = $_COOKIE[COOKIE_NAME] ?? null;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Couleur préférée</title>
    <style>
        body {
            background-color: <?= $color ? htmlspecialchars($color) : DEFAULT_COLOR ?>;
        }
    </style>
</head>

<body>
    <?php if ($color) { ?>
        <h2>Votre couleur préférée est : <span style="color:<?= htmlspecialchars($color) ?>;"><?= htmlspecialchars($color) ?></span></h2>
        <form method="post">
            <input type="hidden" name="supprimer" value="1">
            <button type="submit">Supprimer la préférence</button>
        </form>
    <?php } else { ?>
        <h2>Choisissez votre couleur préférée :</h2>
        <form method="post">
            <input type="color" name="color" value="<?= htmlspecialchars($color) ?>" required>
            <input type="submit" value="Enregistrer">
        </form>
    <?php } ?>
</body>

</html>
