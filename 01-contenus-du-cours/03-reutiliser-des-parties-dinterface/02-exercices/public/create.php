<?php
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
            $birthday ?: null,
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

<?php require __DIR__ . '/../components/head.php'; ?>

<body class="container">
    <?php require __DIR__ . '/../components/header.php'; ?>
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
                <option
                    value="dog"
                    <?= $species === "dog" ? "selected" : "" ?> />
                Chien
                </option>
                <option
                    value="cat"
                    <?= $species === "cat" ? "selected" : "" ?> />
                Chat
                </option>
                <option
                    value="lizard"
                    <?= $species === "lizard" ? "selected" : "" ?> />
                Lézard
                </option>
                <option
                    value="snake"
                    <?= $species === "snake" ? "selected" : "" ?> />
                Serpent
                </option>
                <option
                    value="bird"
                    <?= $species === "bird" ? "selected" : "" ?> />
                Oiseau
                </option>
                <option
                    value="rabbit"
                    <?= $species === "rabbit" ? "selected" : "" ?> />
                Lapin
                </option>
                <option
                    value="other"
                    <?= $species === "other" ? "selected" : "" ?> />
                Autre
                </option>
            </select>

            <fieldset>
                <legend>Sexe</legend>

                <input
                    type="radio"
                    id="male"
                    name="sex"
                    value="male"
                    required
                    <?= $sex === "male" ? "checked" : "" ?> />
                <label for="male">Mâle</label>

                <input
                    type="radio"
                    id="female"
                    name="sex"
                    value="female"
                    required
                    <?= $sex === "female" ? "checked" : "" ?> />
                <label for="female">Femelle</label>
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
    <?php require __DIR__ . '/../components/footer.php'; ?>
</body>

</html>
