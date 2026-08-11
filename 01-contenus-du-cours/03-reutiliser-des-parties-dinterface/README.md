# Réutiliser des parties d'interface

L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).

Ce travail est sous licence [CC BY-SA 4.0][licence].

> [!TIP]
>
> Voici quelques informations relatives à ce contenu.
>
> **Ressources annexes**
>
> - Autres formats :
>   [Presentation (web)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/03-reutiliser-des-parties-dinterface/presentation.html)
>   ·
>   [Presentation (PDF)](https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/03-reutiliser-des-parties-dinterface/03-reutiliser-des-parties-dinterface-presentation.pdf).
> - Exemples de code : [Code source](./01-exemples-de-code/README.md).
> - Exercices : [Énoncés et solutions](./02-exercices/README.md).
>
> **Objectifs**
>
> - Rappeler les concepts d'inclusion de fichiers.
> - Réutiliser des parties d'interface dans une application web.
>
> **Méthodes d'enseignement et d'apprentissage**
>
> Les méthodes d'enseignement et d'apprentissage utilisées pour animer le cours
> sont les suivantes :
>
> - Présentation.
> - Discussions collectives.
> - Travail en autonomie.
>
> **Méthodes d'évaluation**
>
> L'évaluation prend la forme d'exercices à réaliser en autonomie en classe ou à
> la maison.
>
> L'évaluation se fait en utilisant les critères suivants :
>
> - Capacité à s'approprier des exemples de code.
> - Capacité à appliquer les exemples de code à des situations similaires.
> - Capacité à répondre avec justesse.
> - Capacité à argumenter.
>
> Les retours se font de la manière suivante :
>
> - Corrigé des exercices.
>
> L'évaluation ne donne pas lieu à une note.

## Table des matières

- [Table des matières](#table-des-matières)
- [Objectifs](#objectifs)
- [Conclusion](#conclusion)
- [Inclusion de fichiers](#inclusion-de-fichiers)
- [Structure des pages web avec PHP](#structure-des-pages-web-avec-php)
- [Réutiliser des parties d'interface](#réutiliser-des-parties-dinterface-1)
  - [Structure des fichiers](#structure-des-fichiers)
  - [Sortir les parties communes dans des fichiers séparés](#sortir-les-parties-communes-dans-des-fichiers-séparés)
  - [Inclure les fichiers dans les pages web](#inclure-les-fichiers-dans-les-pages-web)
  - [Créer des composants réutilisables](#créer-des-composants-réutilisables)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

Ce second contenu théorique a pour but de vous rappeler les concepts de base
liés aux inclusions de fichiers et à la réutilisation de parties d'interface
dans une application web.

La liste complète des objectifs est disponible dans la section _"Objectifs"_ du
bloc d'information en haut de ce contenu.

## Conclusion

Dans ce cours, nous avons exploré les concepts avancés liés aux bases de données
et à l'utilisation de PDO en PHP. Nous avons vu comment interagir avec des bases
de données MySQL/MariaDB, gérer les erreurs avec des exceptions, et utiliser des
fichiers de configuration pour stocker les paramètres de connexion.

Un rappel des concepts de base des formulaires HTML, de la validation et de la
sécurité a également été fait pour s'assurer que les données saisies par les
utilisateurs sont correctement gérées avant d'être insérées dans la base de
données.

## Inclusion de fichiers

Nous avions vu en Programmation serveur 1 que l'inclusion de fichiers permet de
réutiliser du code dans plusieurs fichiers PHP, notamment les fichiers de
fonctions et des constantes.

Cela permet de créer des applications web modulaires et maintenables.

Comme rappelé dans le cours précédent
[Rappels sur PHP](../02-rappels-sur-php/README.md), il existe plusieurs
fonctions pour inclure des fichiers en PHP, telles que `include_once` et
`require_once` :

- `include_once` : inclut un fichier PHP une seule fois, même si l'instruction
  est appelée plusieurs fois. Si le fichier n'est pas trouvé, une erreur est
  générée, mais le script continue à s'exécuter.
- `require_once` : inclut un fichier PHP une seule fois, même si l'instruction
  est appelée plusieurs fois. Si le fichier n'est pas trouvé, une erreur fatale
  est générée et le script s'arrête.

`require_once` est généralement préféré pour inclure des fichiers essentiels à
l'exécution du script.

## Structure des pages web avec PHP

Également étudié en Programmation serveur 1, la structure des pages web avec PHP
consiste souvent à mélanger du code PHP et du code HTML dans un même fichier.

Cependant, pour améliorer la lisibilité et la maintenabilité du code, il est
recommandé de séparer le code PHP et le code HTML en utilisant des fichiers
d'inclusion.

Vous vous souvenez peut-être que dans le mini-projet de Programmation serveur 1,
nous avions différentes pages qui partageaient la même structure HTML, notamment
l'en-tête et le pied de page.

Dans cette première version, nous avions copié et collé le code HTML de
l'en-tête et du pied de page dans chaque fichier PHP.

Aujourd'hui, nous allons voir comment réutiliser ces parties d'interface en les
plaçant dans des fichiers séparés et en les incluant dans chaque page PHP.

## Réutiliser des parties d'interface

De la même manière que nous avons réutilisé des fonctions et des constantes dans
plusieurs fichiers PHP, nous pouvons également réutiliser des parties
d'interface, telles que l'en-tête et le pied de page, dans plusieurs pages web.

### Structure initiale d'une page web

Si nous reprenons la structure initiale d'une page web du mini-projet de
Programmation serveur 1, nous avons le code suivant dans le fichier `index.php`
:

```php
<?php
require_once __DIR__ . '/../src/constants.php';

$pets = [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Page d'accueil | ninetendogs</title>
    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie">
</head>

<body class="container">
    <header>
        <nav>
            <ul>
                <li><strong>ninetendogs</strong></li>
            </ul>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./create.php">Nouvel animal</a></li>
            </ul>
        </nav>
    </header>
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
    <footer>
        <center>
            <small>
                Un projet réalisé dans le cadre du cours <a href="https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course">ProgServ1</a> enseigné à la <a href="https://heig-vd.ch">HEIG-VD</a>.
            </small>
        </center>
    </footer>
</body>

</html>
```

A première vue, ce code peut sembler correct et fonctionnel. Cependant, il
présente plusieurs problèmes de lisibilité et de maintenabilité. En effet, si
nous voulons modifier l'en-tête ou le pied de page, nous devons le faire dans
chaque fichier PHP, ce qui peut rapidement devenir fastidieux et source
d'erreurs.

Il serait donc possible d'améliorer la structure de notre application web en
séparant les parties communes dans des fichiers d'inclusion.

Parmi les parties communes que nous pouvons extraire, nous avons :

- L'en-tête (header) : qui contient le menu de navigation.
- Le pied de page (footer) : qui contient les informations de copyright et de
  licence.
- Le bloc `<head>` : qui contient les métadonnées et les liens vers les fichiers
  CSS, souvent commun à toutes les pages web de notre application.

Ainsi, nous pourrions sortir ces trois parties dans des fichiers séparés et les
inclure dans chaque page PHP, ce qui améliorerait la lisibilité et la
maintenabilité de notre code.

### Structurer les fichiers

Afin de pouvoir réutiliser des parties d'interface dans plusieurs pages web, il
est recommandé de créer une structure de fichiers claire et organisée.

Une proposition de structure de fichiers pour une application web en PHP
pourrait être la suivante (version simplifiée du mini-projet de Programmation
serveur 1) :

```text
project/
├── public/
│   ├── css/
│   │   └── styles.css
│   ├── images/
│   │   └── logo.svg
│   ├── create.php
│   └── index.php
├── src/
│   └── constants.php
├── views/
│   ├── footer.php
│   ├── head.php
│   └── header.php
├── README.md
└── petsmanager.db
```

- Les pages web se trouvent dans le dossier `public/`.
- Les fichiers d'inclusion se trouvent dans le dossier `views/`.
- Les fichiers sources du projet se trouvent dans le dossier `src/`. Ici, seul
  le fichier `constants.php` est présent, mais d'autres fichiers sources peuvent
  être ajoutés au besoin.

### Sortir les parties communes dans des fichiers séparés

Afin de réutiliser les parties communes dans plusieurs pages web, nous allons
sortir ces parties dans des fichiers séparés dans le dossier `views/`.

Il suffit de créer trois fichiers PHP dans le dossier `views/` :

- `head.php` : qui contient le bloc `<head>` de la page web.
- `header.php` : qui contient l'en-tête (header) de la page web.
- `footer.php` : qui contient le pied de page (footer) de la page web.

Le fichier `head.php` pourrait ressembler à ceci :

```php
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Page d'accueil | ninetendogs</title>
    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie">
</head>
```

Vous remarquez peut-être que le titre de la page est statique et qu'il ne change
pas en fonction de la page web. Il serait donc possible de rendre le titre
dynamique en utilisant une variable PHP. Nous y reviendrons plus tard.

Le fichier `header.php` pourrait ressembler à ceci :

```php
<header>
    <nav>
        <ul>
            <li><strong>ninetendogs</strong></li>
        </ul>
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li><a href="./create.php">Nouvel animal</a></li>
        </ul>
    </nav>
</header>
```

Le fichier `footer.php` pourrait ressembler à ceci :

```php
<footer>
    <center>
        <small>
            Un projet réalisé dans le cadre du cours <a href="https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course">ProgServ1</a> enseigné à la <a href="https://heig-vd.ch">HEIG-VD</a>.
        </small>
    </center>
</footer>
```

Ainsi, si un de ces fichiers doit être modifié, il suffit de le faire dans le
fichier correspondant et les modifications seront automatiquement répercutées
dans toutes les pages web qui incluent ce fichier.

### Inclure les fichiers dans les pages web

Maintenant que nous avons sorti les parties communes dans des fichiers séparés,
nous allons les inclure dans chaque page web.

### Créer des composants réutilisables

## Exemples de code

Nous vous invitons maintenant à consulter les exemples de code de la séance afin
de mieux comprendre les concepts abordés.

Vous trouverez les exemples de code ici :
[Exemples de code](./01-exemples-de-code/README.md).

## Exercices

Nous vous invitons maintenant à réaliser les exercices de la séance afin de
mettre en pratique les concepts abordés.

Vous trouverez les exercices et leur corrigé ici :
[Exercices](./02-exercices/README.md).

## À faire pour la semaine suivante

Chaque personne est libre de gérer son temps comme elle le souhaite. Cependant,
il est recommandé pour la séance suivante de :

- Relire les supports de cours si nécessaire.
- Finaliser l'appropriation des exemples de code qui n'ont pas été vus en
  classe.
- Finaliser les exercices qui n'ont pas été terminés en classe.

[licence]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
