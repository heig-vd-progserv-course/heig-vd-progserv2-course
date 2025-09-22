<?php
function greet($name) {
    return "Hello, " . $name . "!";
}

$greetings = greet("Alice");
echo $greetings . "<br>";       // "Hello, Alice!"
echo greet("Bob") . "<br>";     // "Hello, Bob!"
