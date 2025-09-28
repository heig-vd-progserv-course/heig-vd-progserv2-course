<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Tools\ToolsManager;
use Tools\Tool;

// Création d'une instance de ToolsManager
$toolsManager = new ToolsManager();

// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = $_POST["name"];
    $type = $_POST["type"];
    $purchaseDate = $_POST["purchase-date"];
    $price = $_POST["price"];

    $errors = [];

    try {
        // Création d'un nouvel objet `Tool`
        $tool = new Tool(
            null,
            $name,
            $type,
            new \DateTime($purchaseDate),
            (float) $price
        );
    } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
    }

    // S'il n'y a pas d'erreurs, ajout de l'outil
    if (empty($errors)) {
        try {
            // Ajout de l'outil à la base de données
            $toolId = $toolsManager->addTool($tool);

            // Redirection vers la page d'accueil avec tous les outils
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            // Liste des codes d'erreurs : https://en.wikipedia.org/wiki/SQLSTATE
            if ($e->getCode() == 23000) {
                // Erreur de contrainte d'unicité (par exemple, nom déjà utilisé)
                $errors[] = "L'outil existe déjà.";
            } else {
                $errors[] = "Erreur lors de l'interaction avec la base de données : " . $e->getMessage();
            }
        } catch (Exception $e) {
            $errors[] = "Erreur inattendue : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <title>Créer un nouvel outil | MyApp</title>
</head>

<body>
    <main class="container">
        <h1>Créer un nouvel outil</h1>

        <p><a href="../index.php">Accueil</a> > <a href="index.php">Gestion des outils</a> > Création d'un nouvel outil</p>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php if (empty($errors)) { ?>
                <p style="color: green;">Le formulaire a été soumis avec succès !</p>
            <?php } else { ?>
                <p style="color: red;">Le formulaire contient des erreurs :</p>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>

        <form action="create.php" method="POST">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? ''); ?>" required minlength="2">

            <label for="type">Type</label>
            <select id="type" name="type" required>
                <?php foreach (Tool::TYPES as $key => $value) { ?>
                    <option value="<?= $key ?>" <?php if (isset($type) && $type == $key) echo "selected"; ?>><?= $value ?></option>
                <?php } ?>
            </select>

            <label for="purchase-date">Date d'achat</label>
            <input type="date" id="purchase-date" name="purchase-date" value="<?= htmlspecialchars($purchaseDate ?? ''); ?>" required>

            <label for="price">Prix</label>
            <input type="number" id="price" name="price" value="<?= htmlspecialchars($price ?? ''); ?>" required min="0">

            <button type="submit">Créer</button>
        </form>
    </main>
</body>

</html>
