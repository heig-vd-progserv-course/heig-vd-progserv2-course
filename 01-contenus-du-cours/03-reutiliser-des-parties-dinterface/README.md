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
  - [Structure initiale d'une page web](#structure-initiale-dune-page-web)
  - [Structurer les fichiers](#structurer-les-fichiers)
  - [Sortir les parties communes dans des fichiers séparés](#sortir-les-parties-communes-dans-des-fichiers-séparés)
  - [Inclure les fichiers dans les pages web](#inclure-les-fichiers-dans-les-pages-web)
  - [Créer des composants réutilisables](#créer-des-composants-réutilisables)
  - [Passer des paramètres explicites avec une fonction](#passer-des-paramètres-explicites-avec-une-fonction)
- [Résumé](#résumé)
- [Exemples de code](#exemples-de-code)
- [Exercices](#exercices)
- [À faire pour la semaine suivante](#à-faire-pour-la-semaine-suivante)

## Objectifs

Ce second contenu théorique a pour but de vous rappeler les concepts de base
liés aux inclusions de fichiers et à la réutilisation de parties d'interface
dans une application web.

La liste complète des objectifs est disponible dans la section _"Objectifs"_ du
bloc d'information en haut de ce contenu.

## Inclusion de fichiers

Nous avions vu en Programmation serveur 1 que l'inclusion de fichiers permet de
réutiliser du code dans plusieurs fichiers PHP, notamment les fichiers de
fonctions et des constantes.

Cela permet de créer des applications web modulaires et maintenables.

Comme rappelé dans le cours précédent
[Rappels sur PHP](../02-rappels-sur-php/README.md), il existe plusieurs
fonctions pour inclure des fichiers en PHP, telles que `include`, `require`,
`include_once` et `require_once` :

- `include` : inclut un fichier PHP et génère une erreur si le fichier n'est pas
  trouvé, mais le script continue à s'exécuter.
- `require` : inclut un fichier PHP et génère une erreur fatale si le fichier
  n'est pas trouvé, ce qui arrête l'exécution du script.
- `include_once` : inclut un fichier PHP une seule fois, même si l'instruction
  est appelée plusieurs fois. Si le fichier n'est pas trouvé, une erreur est
  générée, mais le script continue à s'exécuter.
- `require_once` : inclut un fichier PHP une seule fois, même si l'instruction
  est appelée plusieurs fois. Si le fichier n'est pas trouvé, une erreur fatale
  est générée et le script s'arrête.

`require` et `require_once` est généralement préféré pour inclure des fichiers essentiels à
l'exécution du script.

Nous préférons utiliser `require_once` pour inclure des fichiers de fonctions et des
fichiers de constantes, car cela garantit que le fichier n'est inclus qu'une seule fois, évitant ainsi les erreurs de redéfinition de fonctions ou de constantes.

`require` est couramment utilisé pour des parties d'interface réutilisables car, elles, peuvent être incluses plusieurs fois dans le même fichier.

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
                            <td><?= htmlspecialchars(PET_SPECIES[$pet['species']]) ?></td>
                            <td><?= htmlspecialchars(PET_SEXES[$pet['sex']]) ?></td>
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
│   ├── constants.php
│   └── functions.php
├── views/
│   ├── footer.php
│   ├── head.php
│   └── header.php
├── README.md
└── petsmanager.db
```

- Les pages web se trouvent dans le dossier `public/`.
- Les fichiers d'inclusion se trouvent dans le dossier `views/`.
- Les fichiers sources du projet se trouvent dans le dossier `src/`. Ici, les
  fichiers `constants.php` et `functions.php` sont présents, mais d'autres
  fichiers sources peuvent être ajoutés au besoin.

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

Pour cela, nous allons utiliser la fonction `require` pour inclure les
fichiers dans chaque page web.

Par exemple, dans le fichier `index.php`, nous allons inclure les fichiers
`head.php`, `header.php` et `footer.php` de la manière suivante :

> [!NOTE]
>
> Pour rappel, l'affichage ci-dessous est un "git diff" qui montre les
> modifications à apporter au fichier `index.php` pour inclure les fichiers
> d'interface. Les lignes précédées d'un signe `-` sont à supprimer, et celles
> précédées d'un signe `+` sont à ajouter.

```diff
diff --git a/public/index.php b/public/index.php
index f988025..edddce8 100644
--- a/public/index.php
+++ b/public/index.php
@@ -7,29 +7,10 @@ $pets = [];
 <!DOCTYPE html>
 <html lang="fr">

-<head>
-    <meta charset="utf-8">
-    <meta name="viewport" content="width=device-width, initial-scale=1">
-    <meta name="color-scheme" content="light dark">
-    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
-    <link rel="stylesheet" href="./css/styles.css">
-
-    <title>Page d'accueil | ninetendogs</title>
-    <meta name="description" content="ninetendogs - Gestionnaire d'animaux de compagnie">
-</head>
+<?php require __DIR__ . '/../views/head.php'; ?>

 <body class="container">
-    <header>
-        <nav>
-            <ul>
-                <li><strong>ninetendogs</strong></li>
-            </ul>
-            <ul>
-                <li><a href="./index.php">Accueil</a></li>
-                <li><a href="./create.php">Nouvel animal</a></li>
-            </ul>
-        </nav>
-    </header>
+    <?php require __DIR__ . '/../views/header.php'; ?>
     <main>
         <center>
             <div class="logo">
@@ -74,13 +55,7 @@ $pets = [];
             </table>
         </div>
     </main>
-    <footer>
-        <center>
-            <small>
-                Un projet réalisé dans le cadre du cours <a href="https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course">ProgServ1</a> enseigné à
la <a href="https://heig-vd.ch">HEIG-VD</a>.
-            </small>
-        </center>
-    </footer>
+    <?php require __DIR__ . '/../views/footer.php'; ?>
 </body>

 </html>
```

Ici, toutes les parties communes ont été remplacées par des inclusions de
fichiers, ce qui rend le code plus lisible et plus maintenable. Si nous voulons
modifier l'en-tête ou le pied de page, il suffit de le faire dans les fichiers
`header.php` et `footer.php`, et les modifications seront automatiquement
répercutées dans toutes les pages web qui incluent ces fichiers.

De même avec le bloc `<head>`, si nous voulons modifier les métadonnées ou les
liens vers les fichiers CSS, il suffit de le faire dans le fichier `head.php`,
et les modifications seront automatiquement répercutées dans toutes les pages
web qui incluent ce fichier.

Avec les modifications apportées, nous avons maintenant une structure de
fichiers plus claire et organisée, et nous avons réutilisé les parties communes
dans plusieurs pages web.

Par contre, le titre de la page est toujours statique et ne change pas en
fonction de la page web. Il serait donc possible de rendre le titre dynamique en
utilisant une variable PHP.

### Créer des composants réutilisables

Avec cette nouvelle structure de fichiers, nous avons maintenant la possibilité
de créer des composants réutilisables pour notre application web.

Si nous modifions le fichier `head.php` pour utiliser une variable PHP pour le
titre de la page, nous pourrions avoir quelque chose comme ceci :

```php
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title><?= htmlspecialchars($title ?? 'ninetendogs') ?></title>
    <meta name="description" content="<?= htmlspecialchars($description ?? "ninetendogs - Gestionnaire d'animaux de compagnie") ?>">
</head>
```

Ici, deux variables PHP `$title` et `$description` sont utilisées pour définir
le titre et la description de la page. Si ces variables ne sont pas définies,
des valeurs par défaut sont utilisées grâce à l'opérateur `??` (voir
[documentation PHP](https://www.php.net/manual/en/language.operators.comparison.php)).

> [!IMPORTANT]
>
> Notez bien que l'opérateur `??` est utilisé **à l'intérieur** de l'appel à
> `htmlspecialchars()`, et non à l'extérieur. En écrivant
> `htmlspecialchars($title) ?? 'ninetendogs'`, la valeur par défaut ne serait
> jamais utilisée : `htmlspecialchars()` ne retourne jamais `null` et une
> variable non définie provoquerait un avertissement.

Notez également que les deux variables sont échappées avec
`htmlspecialchars()`. Même si ces valeurs proviennent de notre propre code,
prendre l'habitude d'échapper systématiquement tout ce qui est affiché dans du
HTML évite les failles de type XSS.

Si ces variables sont définies dans le fichier PHP qui inclut le fichier
`head.php`, elles seront utilisées pour définir le titre et la description de la
page :

```diff
diff --git a/public/index.php b/public/index.php
index edddce8..8e014a9 100644
--- a/public/index.php
+++ b/public/index.php
@@ -1,6 +1,9 @@
 <?php
 require_once __DIR__ . '/../src/constants.php';

+$title = "Page d'accueil | ninetendogs";
+$description = "ninetendogs - Gestionnaire d'animaux de compagnie - Page d'accueil";
+
 $pets = [];
 ?>
```

Ici, dans la page d'accueil, le titre et la description sont définis pour
refléter le contenu de la page. Si nous ne définissons pas ces variables dans
une autre page, elles ne seront pas définies et les valeurs par défaut seront
utilisées.

Ainsi chaque page web peut définir son propre titre et sa propre description, ce
qui est important pour le référencement (SEO) et l'expérience utilisateur.

Cette approche permet de créer des composants réutilisables pour notre
application web, ce qui améliore la lisibilité et la maintenabilité du code.

### Passer des paramètres explicites avec une fonction

L'approche précédente fonctionne, mais elle a un défaut : le fichier `head.php`
dépend de variables (`$title` et `$description`) qui sont définies **ailleurs**,
dans la page qui l'inclut.

Rien dans le fichier `head.php` n'indique quelles variables il attend, et rien
dans `index.php` n'indique que les variables `$title` et `$description` sont
destinées au fichier `head.php`. Si nous oublions d'en définir une, ou si nous
nous trompons dans son nom, aucune erreur n'est signalée : la valeur par défaut
est utilisée silencieusement.

Pour rendre cette relation explicite, nous pouvons écrire une fonction qui
affiche une vue en lui passant ses valeurs en paramètres. Créons pour cela un
fichier `src/functions.php` :

```php
<?php

function render(string $view, array $data = []): void
{
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
```

La fonction `extract()` (voir
[documentation PHP](https://www.php.net/manual/en/function.extract.php))
transforme les clés d'un tableau associatif en variables. Ainsi, le tableau
`['title' => 'Accueil']` met la variable `$title` à disposition de la vue.

Ce qui change ici est important : ces variables sont créées **à l'intérieur de
la fonction** `render()`. Elles n'existent donc que le temps d'afficher la vue
et ne "polluent" pas le reste de la page.

Nous pouvons maintenant remplacer les inclusions par des appels à `render()`
dans la page d'accueil :

```diff
diff --git a/public/index.php b/public/index.php
index 8e014a9..b3c1f42 100644
--- a/public/index.php
+++ b/public/index.php
@@ -1,9 +1,7 @@
 <?php
 require_once __DIR__ . '/../src/constants.php';
+require_once __DIR__ . '/../src/functions.php';

-$title = "Page d'accueil | ninetendogs";
-$description = "ninetendogs - Gestionnaire d'animaux de compagnie - Page d'accueil";
-
 $pets = [];
 ?>

@@ -11,10 +9,13 @@ $pets = [];
 <!DOCTYPE html>
 <html lang="fr">

-<?php require __DIR__ . '/../views/head.php'; ?>
+<?php render('head', [
+    'title' => "Page d'accueil | ninetendogs",
+    'description' => "ninetendogs - Gestionnaire d'animaux de compagnie - Page d'accueil",
+]); ?>

 <body class="container">
-    <?php require __DIR__ . '/../views/header.php'; ?>
+    <?php render('header'); ?>
     <main>
@@ -60,7 +61,7 @@ $pets = [];
     </main>
-    <?php require __DIR__ . '/../views/footer.php'; ?>
+    <?php render('footer'); ?>
 </body>
```

Le titre et la description ne sont plus des variables globales définies en haut
du fichier : ils sont écrits directement à l'endroit où la vue est affichée. En
lisant l'appel à `render()`, nous savons immédiatement quelles valeurs sont
transmises au fichier `head.php`.

Les vues qui n'ont besoin d'aucune valeur, comme `header.php` et `footer.php`,
s'affichent simplement avec `render('header')` et `render('footer')`, car le
paramètre `$data` possède une valeur par défaut (`[]`).

Nous appliquons exactement la même transformation à la page de création d'un
animal de compagnie, dans le fichier `create.php` :

```diff
diff --git a/public/create.php b/public/create.php
index 4a7d0e1..c95b8a3 100644
--- a/public/create.php
+++ b/public/create.php
@@ -1,8 +1,6 @@
 <?php
 require_once __DIR__ . '/../src/constants.php';
+require_once __DIR__ . '/../src/functions.php';

-$title = "Créer un nouvel animal";
-$description = "ninetendogs - Gestionnaire d'animaux de compagnie - Création d'un animal de compagnie";
-
 // Définition des valeurs par défaut de l'animal de compagnie
 $name = $_POST["name"] ?? '';
@@ -25,10 +23,13 @@
 <!DOCTYPE html>
 <html lang="fr">

-<?php require __DIR__ . '/../views/head.php'; ?>
+<?php render('head', [
+    'title' => "Créer un nouvel animal | ninetendogs",
+    'description' => "ninetendogs - Gestionnaire d'animaux de compagnie - Création d'un animal de compagnie",
+]); ?>

 <body class="container">
-    <?php require __DIR__ . '/../views/header.php'; ?>
+    <?php render('header'); ?>
     <main>
@@ -217,7 +218,7 @@
     </main>
-    <?php require __DIR__ . '/../views/footer.php'; ?>
+    <?php render('footer'); ?>
 </body>
```

Chaque page définit ainsi son propre titre et sa propre description, sans qu'il
soit nécessaire de créer des variables globales.

> [!TIP]
>
> Cette manière de faire — une vue, des valeurs passées en paramètres — est
> exactement le principe des _composants_ que vous retrouverez dans les moteurs
> de templates (Twig, Blade) et dans les bibliothèques d'interface côté client
> (React, Vue). Les valeurs passées à un composant y sont souvent appelées des
> _props_ (pour _properties_).

## Résumé

PHP met à disposition plusieurs fonctions pour inclure des fichiers dans un
script, telles que `include`, `require`, `include_once` et `require_once`. Ces
fonctions permettent de réutiliser du code dans plusieurs fichiers PHP,
notamment les fichiers de fonctions et des constantes.

En utilisant ce mécanisme d'inclusion de fichiers, nous pouvons également
réutiliser des parties d'interface dans plusieurs pages web, telles que
l'en-tête et le pied de page. Nous utilisons `require_once` pour les fichiers de
fonctions et de constantes, et `require` pour les parties d'interface, car
celles-ci peuvent devoir être incluses plusieurs fois dans une même page.

Enfin, en écrivant une fonction `render()` qui affiche une vue à partir d'un
tableau de valeurs, nous rendons explicite ce que chaque partie d'interface
attend. Les valeurs sont passées en paramètres au moment de l'affichage plutôt
que par des variables globales, ce qui est le principe des _composants_ que vous
retrouverez dans de nombreux autres langages et bibliothèques.

Ainsi, dès que nous souhaitons modifier l'en-tête ou le pied de page, il suffit
de le faire dans les fichiers d'inclusion correspondants, et les modifications
seront automatiquement répercutées dans toutes les pages web qui incluent ces
fichiers.

En utilisant des variables PHP dans les fichiers d'inclusion, nous pouvons
également créer des composants réutilisables : il suffit de définir les
variables dans le fichier PHP qui inclut le fichier d'inclusion, et elles seront
utilisées pour personnaliser le contenu du composant réutilisable.

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
