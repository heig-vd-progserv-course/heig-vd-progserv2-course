---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Réutiliser des parties d'interface
description: Réutiliser des parties d'interface pour le cours ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/presentation.html
header: "[**Réutiliser des parties d'interface**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/README.md)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Réutiliser des parties d'interface

<!--
_class: lead
_paginate: false
-->

[<img src="https://raw.githubusercontent.com/primer/octicons/refs/heads/main/icons/mark-github-24.svg" style="vertical-align: middle; width: 32px;" alt="GitHub logo"> `github.com/heig-vd-progserv-course/heig-vd-progserv2-course`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course)

[Visualiser le contenu complet sur GitHub][contenu-complet].

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## Retrouvez le contenu complet de cette présentation sur GitHub

<!-- _class: lead -->

_Cette présentation est un résumé du contenu complet disponible sur GitHub._

_Pour plus de détails, retrouvez le contenu complet [ici][contenu-complet] ou en
cliquant sur l'en-tête de ce document._

## Objectifs

- Rappeler les concepts d'inclusion de fichiers.
- Réutiliser des parties d'interface dans une application web.

![bg right:40%][illustration-objectifs]

## Inclusion de fichiers

- L'inclusion de fichiers permet de réutiliser du code PHP.
- Plusieurs fonctions disponibles :
  - `include` continue l'exécution si le fichier est introuvable.
  - `require` arrête l'exécution si le fichier est introuvable (mieux !).
  - Les variantes `*_once` évitent les inclusions multiples.
- Usage recommandé :
  - `require_once` pour les fichiers de fonctions et de constantes.
  - `require` pour les composants d'interface réutilisables.

## Structure des pages web avec PHP

- Une page PHP mélange souvent logique serveur (code PHP) et HTML.
- Cette approche devient difficile à maintenir quand le projet grandit.
- Le copier-coller du `header`, du `footer` et du bloc `head` crée de la
  duplication.
- Une meilleure approche consiste à extraire ces parties communes dans des
  fichiers séparés.

## Réutiliser des parties d'interface

- Objectif : réduire la duplication et améliorer la lisibilité.
- Parties communes typiques :
  - le bloc `head`.
  - le `header`.
  - le `footer`.

![bg right:40%][illustration-reutiliser-des-parties-dinterface]

### Structure initiale d'une page web

En reprenant le mini-projet de
[Programmation serveur 1 (ProgServ1)](https://github.com/heig-vd-progserv-course/heig-vd-progserv1-course),
les pages web sont structurées ainsi (voir
[exemples de code](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/01-exemples-de-code))
:

- `index.php` et `create.php` contiennent chacun toute la structure HTML.
- Les mêmes blocs sont copiés dans plusieurs fichiers.

Conséquence : toute modification du menu, du pied de page ou des métadonnées
doit être répétée partout.

### Structurer les fichiers

<div class="two-columns">
<div>

Comment structurer nos fichiers dans notre projet ?

Voici une proposition :

- `public/` : pages accessibles via le navigateur.
- `components/` : parties d'interface réutilisables.
- `src/` : logique applicative.

</div>
<div>

```text
project/
├── components/
│   ├── footer.php
│   ├── head.php
│   └── header.php
├── public/
│   ├── create.php
│   └── index.php
└── src/
    ├── constants.php
    └── functions.php
```

</div>
</div>

### Sortir les parties communes dans des fichiers séparés

Créer dans `components/` :

- `head.php` pour les métadonnées et les styles.
- `header.php` pour la navigation.
- `footer.php` pour les informations de bas de page.

Bénéfice : une modification est faite une seule fois puis réutilisée partout.

### Inclure les fichiers dans les pages web (1/2)

```php
<?php require __DIR__ . '/../components/head.php'; ?>
<?php require __DIR__ . '/../components/header.php'; ?>
<?php require __DIR__ . '/../components/footer.php'; ?>
```

- Résultat :
  - Pages plus courtes.
  - Structure plus claire.
  - Maintenance simplifiée.

### Inclure les fichiers dans les pages web (2/2)

Limites de cette approche :

- Toutes les pages ont le même `head`, `header` et `footer`.
- Il n'est pas possible de passer des paramètres pour personnaliser le contenu
  de ces parties communes.

![bg right:40%][illustration-reutiliser-des-parties-dinterface]

### Créer des composants réutilisables (1/3)

Il est possible de définir des variables avant l'inclusion pour personnaliser le
contenu des composants.

En effet, PHP inclut le fichier dans le contexte actuel, donc les variables
définies avant l'inclusion sont accessibles dans le fichier inclus.

![bg right:40%][illustration-reutiliser-des-parties-dinterface]

### Créer des composants réutilisables (2/3)

Le composant `head.php` peut recevoir des valeurs dynamiques :

```php
<title><?= htmlspecialchars($title ?? 'ninetendogs') ?></title>
<meta
    name="description"
    content="<?= htmlspecialchars(
        $description ?? "ninetendogs - Gestionnaire d'animaux de compagnie"
    ) ?>"
>
```

- `??` permet de définir des valeurs par défaut.
- Toujours se protéger des attaques XSS avec `htmlspecialchars()`.

### Créer des composants réutilisables (3/3)

Limites avec l'approche précédente :

- Les variables `$title` et `$description` doivent être définies avant
  l'inclusion.
- Cela peut créer des dépendances implicites et rendre le code moins lisible.
- Une meilleure approche consiste à passer des paramètres explicites à une
  fonction d'inclusion.

### Passer des paramètres explicites avec une fonction (1/3)

Approche plus explicite : une fonction pour afficher un composant avec des
paramètres.

```php
function render(string $component, array $data = []): void {
    $componentPath = __DIR__ . '/../components/' . $component . '.php';
    extract($data, EXTR_SKIP);
    require $componentPath;
}
```

### Passer des paramètres explicites avec une fonction (2/3)

Exemple d'appel :

```php
<?php render('head', [
    'title' => "Page d'accueil | ninetendogs",
    'description' => "ninetendogs - Gestionnaire d'animaux de compagnie - Page d'accueil",
]); ?>
```

Ici, le composant `head.php` se verra passer les propriétés `title` et
`description` via le tableau `$data`. Il pourra alors les utiliser pour générer
dynamiquement son contenu.

### Passer des paramètres explicites avec une fonction (3/3)

Avantages :

- Les données attendues sont visibles au point d'appel.
- Moins de dépendance à des variables globales implicites.
- Meilleure transition vers la logique de composants (props) que vous verrez
  dans d'autres langages.
- Meilleure lisibilité et maintenabilité.

### Conclusion

- Les fonctions d'inclusion permettent de modulariser une application PHP.
- Les composants réutilisables permettent de réduire la duplication de code .
- Le passage de paramètres rend les composants plus explicites.
- Cette approche améliore la lisibilité et la maintenabilité.

![bg right:40%][illustration-principale]

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## À vous de jouer !

- (Re)lire le support de cours.
- Explorer les exemples de code.
- Faire les exercices.
- Poser des questions si nécessaire.

➡️ [Visualiser le contenu complet sur GitHub][contenu-complet].

**N'hésitez pas à vous entraider si vous avez des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/low-angle-view-of-ball-shoots-in-the-ring-j6brni7fpvs)
- [Illustration][illustration-reutiliser-des-parties-dinterface] par
  [Hal Gatewood](https://unsplash.com/@halacious) sur
  [Unsplash](https://unsplash.com/photos/assorted-color-abstract-painting-tZc3vjPCk-Q)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[contenu-complet]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/05-reutiliser-des-parties-dinterface/README.md
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-reutiliser-des-parties-dinterface]:
	https://images.unsplash.com/photo-1522542550221-31fd19575a2d?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
