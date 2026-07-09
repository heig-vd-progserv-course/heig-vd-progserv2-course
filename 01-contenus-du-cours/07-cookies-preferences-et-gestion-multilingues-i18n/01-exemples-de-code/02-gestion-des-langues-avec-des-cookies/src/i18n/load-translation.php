<?php
function loadTranslation($lang) {
    $lang_file = __DIR__ . "/translations/{$lang}.php";

    // Utilisation de la langue par défaut si la langue/le fichier n'existe pas
    if (!file_exists($lang_file)) {
        $lang_file = __DIR__ . "/translations/fr.php";
    }

    return require_once $lang_file;
}
