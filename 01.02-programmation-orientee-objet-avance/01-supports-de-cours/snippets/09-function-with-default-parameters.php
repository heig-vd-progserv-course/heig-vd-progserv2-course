<?php
function greet($name = "World") {
    return "Hello, " . $name . "!";
}

echo greet() . "<br>";          // "Hello, World!" (utilise la valeur par défaut)
echo greet("Alice") . "<br>";   // "Hello, Alice!" (utilise l'argument fourni)
