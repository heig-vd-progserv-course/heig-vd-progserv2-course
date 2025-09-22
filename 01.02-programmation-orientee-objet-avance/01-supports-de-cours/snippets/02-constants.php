
<?php
define("PI", 3.14159); // Définition d'une constante
const EULER = 2.71828; // Définition d'une constante

echo PI;    // Affiche 3.14159
echo EULER; // Affiche 2.71828

EULER = 3.14; // Erreur : syntax error, unexpected token "=" (Expression is not writable)
