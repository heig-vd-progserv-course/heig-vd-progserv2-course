<?php
require_once __DIR__ . '/database.php';

function getPets(): array {
    global $pdo;

    $sql = "SELECT * FROM pets ORDER BY name ASC";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $pets = $stmt->fetchAll();

    foreach ($pets as &$pet) {
        if ($pet['personalities']) {
            $pet['personalities'] = explode(",", $pet['personalities']);
        }
    }

    return $pets;
}

function getPetById(int $id): ?array {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM pets WHERE id = :id");

    $stmt->bindValue(':id', $id);

    $stmt->execute();

    $pet = $stmt->fetch();

    if ($pet) {
        if ($pet['personalities']) {
            $pet['personalities'] = explode(",", $pet['personalities']);
        }

        return $pet;
    }

    return null;
}

function validatePet(
    ?string $name,
    ?string $species,
    ?string $nickname,
    ?string $sex,
    ?string $birthday,
    ?string $color,
    ?array $personalities,
    ?string $size,
    ?string $weight,
    ?string $notes,
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

    if (!empty($nickname)) {
        if (strlen($nickname) < 2) {
            array_push($errors, "Le surnom doit contenir au minimum 2 caractères.");
        } else if (strlen($nickname) > 50) {
            array_push($errors, "Le surnom doit contenir au maximum 30 caractères.");
        }
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

    if (!empty($color)) {
        if (!preg_match("/^#[a-f0-9]{6}$/i", $color)) {
            array_push($errors, "La couleur n'est pas valide.");
        }
    }

    if (!empty($personalities)) {
        foreach ($personalities as $personality) {
            if (!in_array($personality, ["friendly", "playful", "lazy", "shy", "curious", "aggressive"])) {
                array_push($errors, "La personnalité '$personality' n'est pas valide.");
            }
        }
    }

    if (!empty($size)) {
        if (!is_numeric($size) || $size < 1) {
            array_push($errors, "La taille doit être un nombre positif plus grand que 0.");
        }
    }

    if (!empty($weight)) {
        if (!is_numeric($weight) || $weight < 1) {
            array_push($errors, "Le poids doit être un nombre positif plus grand que 0.");
        }
    }

    if (!empty($notes)) {
        if (strlen($notes) < 10) {
            array_push($errors, "Les notes doivent contenir au minimum 10 caractères.");
        } else if (strlen($notes) > 500) {
            array_push($errors, "Les notes doivent contenir au maximum 500 caractères.");
        }
    }

    return $errors;
}

function addPet(
    string $name,
    string $species,
    ?string $nickname,
    string $sex,
    ?string $birthday,
    ?string $color,
    ?array $personalities,
    ?string $size,
    ?string $weight,
    ?string $notes,
): ?int {
    global $pdo;

    $sql = "INSERT INTO pets (
        name,
        species,
        nickname,
        sex,
        birthday,
        color,
        personalities,
        size,
        weight,
        notes
    ) VALUES (
        :name,
        :species,
        :nickname,
        :sex,
        :birthday,
        :color,
        :personalities,
        :size,
        :weight,
        :notes
    )";

    $stmt = $pdo->prepare($sql);

    if ($personalities) {
        $personalities = implode(",", $personalities);
    }

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':species', $species);
    $stmt->bindValue(':nickname', $nickname);
    $stmt->bindValue(':sex', $sex);
    $stmt->bindValue(':birthday', $birthday);
    $stmt->bindValue(':color', $color);
    $stmt->bindValue(':personalities', $personalities);
    $stmt->bindValue(':size', $size);
    $stmt->bindValue(':weight', $weight);
    $stmt->bindValue(':notes', $notes);

    $stmt->execute();

    // Alternativement, on peut aussi utiliser la syntaxe suivante pour lier les valeurs et exécuter la requête en une seule étape :
    // $success = $stmt->execute([
    //     ':name' => $name,
    //     ':species' => $species,
    //     ':nickname' => $nickname,
    //     ':sex' => $sex,
    //     ':birthday' => $birthday,
    //     ':color' => $color,
    //     ':personalities' => $personalities ? implode(",", $personalities) : null,
    //     ':size' => $size,
    //     ':weight' => $weight,
    //     ':notes' => $notes,
    // ]);

    $lastInsertId = $pdo->lastInsertId();

    return $lastInsertId;
}

/**
 * Affiche une partie d'interface (une "vue") stockée dans le dossier `views`.
 *
 * Les valeurs passées dans `$data` sont transformées en variables utilisables
 * directement dans la vue. Par exemple, `render('head', ['title' => 'Accueil'])`
 * met la variable `$title` à disposition du fichier `views/head.php`.
 *
 * @param string $view Nom du fichier de vue, sans le dossier ni l'extension `.php`.
 * @param array $data Valeurs à mettre à disposition de la vue.
 */
function render(string $view, array $data = []): void {
    // Le chemin est calculé avant `extract()` afin qu'une valeur de `$data` ne
    // puisse pas écraser la variable `$viewPath`
    $viewPath = __DIR__ . '/../views/' . $view . '.php';

    // `extract()` transforme les clés du tableau en variables locales à la
    // fonction. `EXTR_SKIP` empêche d'écraser les variables qui existent déjà
    // ici (`$view`, `$data` et `$viewPath`)
    extract($data, EXTR_SKIP);

    // `require` et non `require_once`, afin de pouvoir afficher plusieurs fois
    // la même vue dans une même page
    require $viewPath;
}
