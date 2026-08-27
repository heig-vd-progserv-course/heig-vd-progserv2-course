<?php
// Vérifie si le cookie 'language' est défini.
if (isset($_COOKIE['language'])) {
    $language = $_COOKIE['language'];
    echo "La langue préférée est : " .
        htmlspecialchars($language);
} else {
    echo "Aucune langue préférée définie.";
}
