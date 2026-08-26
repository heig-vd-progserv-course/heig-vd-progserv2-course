<?php
// Définit un cookie 'language'
// avec la valeur 'fr'
// qui expire dans 30 jours
// valide pour tout le site ("/").
setcookie(
    'language',
    'fr',
    time() + (30 * 24 * 60 * 60),
    "/"
);
