<?php
require_once __DIR__ . '/../src/constants.php';
require_once __DIR__ . '/../src/functions.php';

// Définition des valeurs par défaut de l'animal de compagnie
$name = $_POST["name"] ?? '';
$species = $_POST["species"] ?? '';
$sex = $_POST["sex"] ?? '';
$birthday = $_POST["birthday"] ?? '';

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation de l'animal de compagnie
    $errors = validatePet(
        $name,
        $species,
        $sex,
        $birthday,
    );

    // S'il n'y a pas d'erreurs, ajoute l'animal de compagnie à la base de données
    if (empty($errors)) {
        $newPetId = addPet(
            $name,
            $species,
            $sex,
            $birthday,
        );

        if ($newPetId !== null) {
            header('Location: ./index.php');
            exit;
        } else {
            $errors = array_push($errors, "Une erreur est survenue lors de l'ajout de l'animal de compagnie.");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php render('head', [
    'title' => "Créer un nouvel animal | ninetendogs",
    'description' => "ninetendogs - Gestionnaire d'animaux de compagnie - Création d'un animal de compagnie",
]); ?>

<body class="container">
    <?php render('header'); ?>
    <main>
        <h1>Créer un nouvel animal de compagnie</h1>

        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
            <?php if (!empty($errors)) { ?>
                <p style="color: red;">Le formulaire contient des erreurs :</p>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>

        <form action="./create.php" method="POST">
            <label for="name">Nom</label>
            <input
                type="text"
                id="name"
                name="name"
                value="<?= htmlspecialchars($name) ?>"
                minlength="2"
                maxlength="50"
                required />

            <label for="species">Espèce</label>
            <select id="species" name="species" required>
                <?php foreach (PET_SPECIES as $value => $label) { ?>
                    <option
                        value="<?= htmlspecialchars($value) ?>"
                        <?= $species === $value ? "selected" : "" ?>>
                        <?= htmlspecialchars($label) ?>
                    </option>
                <?php } ?>
            </select>

            <fieldset>
                <legend>Sexe</legend>

                <?php foreach (PET_SEXES as $value => $label) { ?>
                    <input
                        type="radio"
                        id="<?= htmlspecialchars($value) ?>"
                        name="sex"
                        value="<?= htmlspecialchars($value) ?>"
                        required
                        <?= $sex === $value ? "checked" : "" ?> />
                    <label for="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($label) ?></label>
                <?php } ?>
            </fieldset>

            <label for="birthday">Date de naissance</label>
            <input
                type="date"
                id="birthday"
                name="birthday"
                value="<?= htmlspecialchars($birthday) ?>"
                required
                max="<?= date("Y-m-d") ?>" />

            <button type="submit">Créer le nouvel animal</button>
        </form>
    </main>
    <?php render('footer'); ?>
</body>

</html>
