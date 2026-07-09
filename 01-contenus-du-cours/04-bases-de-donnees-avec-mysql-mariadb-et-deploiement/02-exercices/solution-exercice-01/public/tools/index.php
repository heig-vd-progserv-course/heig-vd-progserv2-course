<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Tools\ToolsManager;
use Tools\Tool;

// Création d'une instance de ToolsManager
$toolsManager = new ToolsManager();

// Récupération de tous les outils
$tools = $toolsManager->getTools();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <title>Gestion des outils | MyApp</title>
</head>

<body>
    <main class="container">
        <h1>Gestion des outils</h1>

        <p><a href="../index.php">Accueil</a> > Gestion des outils</p>

        <h2>Liste des outils</h2>

        <p><a href="create.php"><button>Créer un nouvel outil</button></a></p>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Date d'achat</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tools as $tool) { ?>
                    <tr>
                        <td><?= htmlspecialchars($tool->getName()) ?></td>
                        <td><?= htmlspecialchars(Tool::TYPES[$tool->getType()]) ?></td>
                        <td><?= htmlspecialchars($tool->getPurchaseDate()->format('Y-m-d')) ?></td>
                        <td><?= htmlspecialchars($tool->getPrice()) ?></td>
                        <td>
                            <a href="delete.php?id=<?= htmlspecialchars($tool->getId()) ?>"><button>Supprimer</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>
