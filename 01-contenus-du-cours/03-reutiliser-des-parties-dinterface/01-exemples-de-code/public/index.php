<?php
require_once __DIR__ . '/../src/constants.php';

$pets = [];
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once __DIR__ . '/../views/head.php'; ?>

<body class="container">
    <?php require_once __DIR__ . '/../views/header.php'; ?>
    <main>
        <center>
            <div class="logo">
                <img src="./images/logo.svg" alt="ninetendogs logo">
            </div>

            <h1>ninetendogs</h1>
        </center>

        <p>Bienvenue sur ninetendogs, le gestionnaire d'animaux de compagnie !</p>

        <p>Cette application te permet de gérer facilement tes animaux de compagnie.</p>

        <h2>Liste des animaux de compagnie</h2>

        <div class="overflow-auto">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Espèce</th>
                        <th>Sexe</th>
                        <th>Date de naissance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pets as $pet) { ?>
                        <tr>
                            <td><?= htmlspecialchars($pet['name']) ?></td>
                            <td><?= PET_SPECIES[htmlspecialchars($pet['species'])] ?></td>
                            <td><?= PET_SEXES[htmlspecialchars($pet['sex'])] ?></td>
                            <td><?= htmlspecialchars($pet['birthday']) ?></td>
                            <td>
                                <a href="./view.php?id=<?= htmlspecialchars($pet['id']) ?>">
                                    <button>Voir</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php require_once __DIR__ . '/../views/footer.php'; ?>
</body>

</html>
