<?php
function greet() {
    return "Hello, World!";
}

// 1. Exécute la fonction `greet()`
// 2. Récupère la valeur de retour
// 3. Affecte (= donne) cette valeur à la variable `$greetings`
$greetings = greet();

// Affiche le résultat ("Hello, World!")
echo $greetings;
