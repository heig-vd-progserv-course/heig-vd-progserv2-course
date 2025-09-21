<?php
// Indique à PHP de considérer tous les fichiers avec l'extension `.php` pour l'autoloading
spl_autoload_extensions(".php");

// Charge les classes automatiquement
spl_autoload_register(function ($class) {
    // Convertit les séparateurs de namespace en séparateurs de répertoires
    $relativePath = str_replace('\\', '/', $class);

    // Construit le chemin complet du fichier
    $file = __DIR__ . '/../classes/' . $relativePath . '.php';

    // Vérifie si le fichier existe avant de l'inclure
    if (file_exists($file)) {
        require_once $file;
    } else {
        // Debug: uncomment to see what files the autoloader is looking for
        echo "Autoloader: Could not find file: $file\n";
    }
});



// spl_autoload_register(function ($class) {
//     // Remove the Plants prefix since our classes are organized under /classes/
//     $classPath = str_replace('\Plants\\', '', $class);

//     // Convert namespace separators to directory separators
//     $relativePath = str_replace('\\', '/', $classPath);

//     // Build the full file path
//     $file = __DIR__ . '/../classes/' . $relativePath . '.php';

//     // Vérifie si le fichier existe avant de l'inclure
//     if (file_exists($file)) {
//         require_once $file;
//     } else {
//         // Debug: uncomment to see what files the autoloader is looking for
//         echo "Autoloader: Could not find file: $file\n";
//     }
// });
