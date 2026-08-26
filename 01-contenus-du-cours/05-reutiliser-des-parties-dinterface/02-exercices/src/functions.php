<?php
require_once __DIR__ . '/database.php';

function getPets(): array {
    global $pdo;

    $sql = "SELECT * FROM pets ORDER BY name ASC";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $pets = $stmt->fetchAll();

    return $pets;
}

function validatePet(
    ?string $name,
    ?string $species,
    ?string $sex,
    ?string $birthday,
): array {
    // Par défaut, il n'y a pas d'erreurs
    $errors = [];

    // Validation des données
    if (empty($name)) {
        array_push($errors, "Le nom est obligatoire.");
    } else if (strlen($name) < 2) {
        array_push($errors, "Le nom doit contenir au minimum 2 caractères.");
    } else if (strlen($name) > 50) {
        array_push($errors, "Le nom doit contenir au maximum 50 caractères.");
    }

    if (empty($species)) {
        array_push($errors, "L'espèce est obligatoire.");
    } else if (!in_array($species, ["dog", "cat", "lizard", "snake", "bird", "rabbit", "other"])) {
        array_push($errors, "L'espèce n'est pas valide.");
    }

    if (empty($sex)) {
        array_push($errors, "Le sexe est obligatoire.");
    } else if (!in_array($sex, ["male", "female"])) {
        array_push($errors, "Le sexe n'est pas valide.");
    }

    if (!empty($birthday)) {
        if (strtotime($birthday) === false) {
            array_push($errors, "La date de naissance n'est pas valide.");
        } else if (strtotime($birthday) > time()) {
            array_push($errors, "La date de naissance ne peut pas être dans le futur.");
        }
    }

    return $errors;
}

function addPet(
    string $name,
    string $species,
    string $sex,
    ?string $birthday,
): ?int {
    global $pdo;

    $sql = "INSERT INTO pets (
        name,
        species,
        sex,
        birthday
    ) VALUES (
        :name,
        :species,
        :sex,
        :birthday
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':species', $species);
    $stmt->bindValue(':sex', $sex);
    $stmt->bindValue(':birthday', $birthday);

    $stmt->execute();

    // Alternativement, on peut aussi utiliser la syntaxe suivante pour lier les valeurs et exécuter la requête en une seule étape :
    // $success = $stmt->execute([
    //     ':name' => $name,
    //     ':species' => $species,
    //     ':sex' => $sex,
    //     ':birthday' => $birthday,
    // ]);

    $lastInsertId = $pdo->lastInsertId();

    return $lastInsertId;
}
