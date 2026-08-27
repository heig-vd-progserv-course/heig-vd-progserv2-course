---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Programmation orientée objet (avancé)
description: Programmation orientée objet (avancé) pour le cours ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/01-contenus-du-cours/09-programmation-orientee-objet-avance/presentation.html
header: "[**Programmation orientée objet (avancé)**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/09-programmation-orientee-objet-avance/README.md)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Programmation orientée objet (avancé)

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

## Objectifs

- Décrire l'utilisation des espaces de noms (namespaces) pour organiser le code.
- Inclure des fichiers de façon automatique à l'aide d'un autoloader et
  d'espaces de noms (namespaces).
- Décrire la différence entre une interface, une classe abstraite et un trait.

![bg right:40%][illustration-objectifs]

## Espaces de noms (namespaces) (1/5)

- Les espaces de noms (namespaces) regroupent des classes, fonctions et
  constantes sous un même nom.
- Ils évitent les conflits de noms dans les projets plus grands.
- Vous pouvez imaginer comme des images sur Instagram que nous étiquetons
  (taggeons) avec des hashtags pour les regrouper par thème.
- Exemple : `Pets\Dog` et `Pets\Cat` sont deux classes différentes, mais elles
  partagent le même nom de classe `Pets`.

## Espaces de noms (namespaces) (2/5)

Reprenons l'exemple des animaux de compagnie étudié dans le contenu
[Programmation orientée objet](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/01-contenus-du-cours/03-programmation-orientee-objet/README.md)
structuré comme suit :

```text
./
├── public/
│   └── index.php
└── src/
    ├── Animals/
    │   └── Animal.php
    └── Pets/
        ├── Cat.php
        ├── Dog.php
        └── Pet.php
```

## Espaces de noms (namespaces) (3/3)

- Nous avons trois classes : `Animal`, `Pet`, `Dog` et `Cat`.
- Nous voulons les regrouper dans des namespaces pour éviter les collisions de
  noms.
- Nous allons créer deux namespaces : `Animals` et `Pets`.

Analysons le code de chaque classe pour voir comment les namespaces sont
utilisés dans l'exemple
[`01-namespaces-sans-autoloader`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/84-relecture-de-la-s%C3%A9ance-9/01-contenus-du-cours/09-programmation-orientee-objet-avance/01-exemples-de-code/01-namespaces-sans-autoloader/README.md).

## Inclusion automatique (autoloader)

- L'autoloader charge les classes automatiquement.
- Il suit une convention de nommage simple : un namespace correspond à un
  dossier.
- Le code se simplifie et les dépendances sont mieux gérées.

Analysons le code de l'exemple
[`02-namespaces-avec-autoloader-simple`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/84-relecture-de-la-s%C3%A9ance-9/01-contenus-du-cours/09-programmation-orientee-objet-avance/01-exemples-de-code/02-namespaces-avec-autoloader-simple/README.md).

## Interfaces, classes abstraites et traits

- Interface : contrat que les classes doivent respecter.
- Classe abstraite : partage du code et méthodes incomplètes.
- Trait : réutilisation de méthodes entre classes sans héritage. Alternative aux
  interfaces et classes abstraites quand deux classes ont un comportement commun
  mais ne partagent pas la même hiérarchie.
- On peut ainsi ajouter des méthodes à plusieurs classes sans les lier par
  héritage.

Analysons le code de l'exemple
[`04-traits`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/84-relecture-de-la-s%C3%A9ance-9/01-contenus-du-cours/09-programmation-orientee-objet-avance/01-exemples-de-code/04-traits/README.md).

## Conclusion

- Les namespaces organisent le code et évitent les collisions.
- L'autoloader rend le projet plus lisible et plus maintenable.
- Les traits complètent les mécanismes de POO lorsque le partage de code ne
  passe pas par l'héritage.

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

<!-- URLs -->

[contenu-complet]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/01-contenus-du-cours/09-programmation-orientee-objet-avance/README.md
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
