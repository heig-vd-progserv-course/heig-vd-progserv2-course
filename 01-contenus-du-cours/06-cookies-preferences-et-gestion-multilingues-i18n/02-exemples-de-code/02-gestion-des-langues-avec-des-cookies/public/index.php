<?php
// Inclusion de l'utilitaire de chargement des traductions
require_once __DIR__ . '/../src/i18n/load-translation.php';

// Constantes
const COOKIE_NAME = 'lang';
const COOKIE_LIFETIME = 3600; // 1 heure
const DEFAULT_LANG = 'fr';

// Déterminer la langue préférée
$lang = $_COOKIE[COOKIE_NAME] ?? DEFAULT_LANG;

$traductions = loadTranslation($lang);

// Changer la langue préférée
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lang = $_POST['language'] ?? DEFAULT_LANG;

    setcookie(COOKIE_NAME, $lang, time() + COOKIE_LIFETIME);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($traductions['title']) ?></title>
</head>

<body>
    <h1><?= htmlspecialchars($traductions['title']) ?></h1>
    <p><?= htmlspecialchars($traductions['welcome']) ?></p>

    <form method="post" action="index.php">
        <label for="language"><?= htmlspecialchars($traductions['choose_language']) ?></label>
        <select name="language" id="language">
            <option value="fr" <?= $lang === 'fr' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['fr']) ?></option>
            <option value="en" <?= $lang === 'en' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['en']) ?></option>
            <option value="it" <?= $lang === 'it' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['it']) ?></option>
        </select>
        <button type="submit"><?= htmlspecialchars($traductions['submit']) ?></button>
    </form>
</body>

</html>
