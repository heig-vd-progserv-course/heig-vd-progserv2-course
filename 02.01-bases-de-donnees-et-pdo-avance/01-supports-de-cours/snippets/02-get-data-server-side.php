<?php
// Gère la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    echo "<p>Les données du formulaire ont été reçues :</p>";
    echo "<ul>";
    echo "<li>Prénom : $firstName</li>";
    echo "<li>Nom : $lastName</li>";
    echo "<li>E-mail : $email</li>";
    echo "<li>Âge : $age</li>";
    echo "</ul>";
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

        <form action="02-get-data-server-side.php" method="POST">
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
