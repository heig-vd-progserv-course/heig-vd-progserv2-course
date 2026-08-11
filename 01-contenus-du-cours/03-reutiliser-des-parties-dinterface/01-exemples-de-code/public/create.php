<?php
$title = "Créer un nouvel animal";
$description = "ninetendogs - Gestionnaire d'animaux de compagnie - Création d'un animal de compagnie";

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
    print_r($_POST);
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once __DIR__ . '/../views/head.php'; ?>

<body class="container">
    <?php require_once __DIR__ . '/../views/header.php'; ?>
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

            <label for="color">Couleur (optionnel)</label>
            <input
                type="color"
                id="color"
                name="color"
                value="<?= htmlspecialchars($color) ?>" />

            <fieldset>
                <legend>Personnalité (optionnel)</legend>

                <input
                    type="checkbox"
                    id="friendly"
                    name="personalities[]"
                    value="friendly"
                    <?= in_array("friendly", $personalities) ? "checked" : "" ?> />
                <label for="friendly">Gentil</label>

                <input
                    type="checkbox"
                    id="playful"
                    name="personalities[]"
                    value="playful"
                    <?= in_array("playful", $personalities) ? "checked" : "" ?> />
                <label for="playful">Joueur</label>

                <input
                    type="checkbox"
                    id="lazy"
                    name="personalities[]"
                    value="lazy" <?= in_array("lazy", $personalities) ? "checked" : "" ?> />
                <label for="lazy">Paresseux</label>

                <input
                    type="checkbox"
                    id="shy"
                    name="personalities[]"
                    value="shy" <?= in_array("shy", $personalities) ? "checked" : "" ?> />
                <label for="shy">Timide</label>

                <input
                    type="checkbox"
                    id="curious"
                    name="personalities[]"
                    value="curious" <?= in_array("curious", $personalities) ? "checked" : "" ?> />
                <label for="curious">Curieux</label>

                <input
                    type="checkbox"
                    id="aggressive"
                    name="personalities[]"
                    value="aggressive" <?= in_array("aggressive", $personalities) ? "checked" : "" ?> />
                <label for="aggressive">Agressif</label>
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
    <?php require_once __DIR__ . '/../views/footer.php'; ?>
</body>

</html>
