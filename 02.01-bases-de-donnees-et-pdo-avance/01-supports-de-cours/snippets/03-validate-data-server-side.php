<?php
// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    $errors = [];

    if (empty($firstName) || strlen($firstName) < 2) {
        $errors[] = "Le prénom doit contenir au moins 2 caractères.";
    }

    if (empty($lastName) || strlen($lastName) < 2) {
        $errors[] = "Le nom doit contenir au moins 2 caractères.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un email valide est requis.";
    }

    if ($age < 0) {
        $errors[] = "L'âge doit être un nombre positif.";
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

    <title>Créer un.e nouvel.le utilisateur.trice | MyApp</title>
</head>

<body>
    <main class="container">
        <h1>Créer un.e nouvel.le utilisateur.trice</h1>

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

        <form action="03-validate-data-server-side.php" method="POST">
            <label for="first-name">Prénom</label>
            <input type="text" id="first-name" name="first-name">

            <label for="last-name">Nom</label>
            <input type="text" id="last-name" name="last-name">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email">

            <label for="age">Âge</label>
            <input type="number" id="age" name="age">

            <button type="submit">Créer</button>
        </form>
    </main>
</body>

</html>
