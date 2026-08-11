<?php
require_once __DIR__ . '/../src/constants.php';
require_once __DIR__ . '/../src/functions.php';

// Définition des valeurs par défaut de l'animal de compagnie
$name = $_POST["name"] ?? '';
$species = $_POST["species"] ?? '';
$nickname = $_POST["nickname"] ?? '';
$sex = $_POST["sex"] ?? '';
$birthday = $_POST["birthday"] ?? '';
$color = $_POST["color"] ?? '';
$personalities = $_POST["personalities"] ?? [];
$size = $_POST["size"] ?? '';
$weight = $_POST["weight"] ?? '';
$notes = $_POST["notes"] ?? '';

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation de l'animal de compagnie
    $errors = validatePet(
        $name,
        $species,
        $nickname,
        $sex,
        $birthday,
        $color,
        $personalities,
        $size,
        $weight,
        $notes,
    );

    // S'il n'y a pas d'erreurs, ajoute l'animal de compagnie à la base de données
    if (empty($errors)) {
        $newPetId = addPet(
            $name,
            $species,
            $nickname ?: null,
            $sex,
            $birthday ?: null,
            $color ?: null,
            $personalities ?: null,
            $size ?: null,
            $weight ?: null,
            $notes ?: null,
        );

        if ($newPetId !== null) {
            header('Location: ./view.php?id=' . $newPetId);
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

            <label for="nickname">Surnom (optionnel)</label>
            <input
                type="text"
                id="nickname"
                name="nickname"
                value="<?= htmlspecialchars($nickname) ?>"
                minlength="2"
                maxlength="50" />

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

            <label for="color">Couleur (optionnel)</label>
            <input
                type="color"
                id="color"
                name="color"
                value="<?= htmlspecialchars($color) ?>" />

            <fieldset>
                <legend>Personnalité (optionnel)</legend>

                <?php foreach (PET_PERSONALITIES as $value => $label) { ?>
                    <input
                        type="checkbox"
                        id="<?= htmlspecialchars($value) ?>"
                        name="personalities[]"
                        value="<?= htmlspecialchars($value) ?>"
                        <?= in_array($value, $personalities) ? "checked" : "" ?> />
                    <label for="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($label) ?></label>
                <?php } ?>
            </fieldset>

            <label for="size">Taille en cm (optionnel)</label>
            <input
                type="number"
                id="size"
                name="size"
                value="<?= htmlspecialchars($size) ?>"
                min="1" />

            <label for="weight">Poids en kg (optionnel)</label>
            <input
                type="number"
                id="weight"
                name="weight"
                value="<?= htmlspecialchars($weight) ?>"
                min="0.1"
                step="0.1" />

            <label for="notes">Notes (optionnel)</label>
            <textarea
                id="notes"
                name="notes"
                rows="4"
                cols="50"
                minlength="10"
                maxlength="500"><?= htmlspecialchars($notes) ?></textarea>

            <button type="submit">Créer le nouvel animal</button>
        </form>
    </main>
    <?php render('footer'); ?>
</body>

</html>
