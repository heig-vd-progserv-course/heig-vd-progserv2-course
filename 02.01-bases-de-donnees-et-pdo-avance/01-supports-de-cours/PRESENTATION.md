---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Bases de données et PDO (avancé)
description: Bases de données et PDO (avancé) pour l'unité d'enseignement ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/index.html
header: "**Bases de données et PDO (avancé)**"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Bases de données et PDO (avancé)

<!--
_class: lead
_paginate: false
-->

[Lien vers le cours][cours]

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## _Retrouvez plus de détails dans le support de cours_

<!-- _class: lead -->

_Cette présentation est un résumé du support de cours. Pour plus de détails,
consultez le [support de cours][cours]._

## Objectifs (1/2)

- Rappeler les concepts de base des formulaires HTML, validation et sécurité.
- Utiliser PDO pour interagir avec une base de données MySQL/MariaDB.
- Utiliser les exceptions pour la gestion des erreurs en PHP.

![bg right:40%][illustration-objectifs]

## Objectifs (2/2)

- Utiliser les fichiers de configuration pour stocker les paramètres de
  connexion à la base de données.

![bg right:40%][illustration-objectifs]

## Conclusion

- PHP est un langage de programmation à typage dynamique, largement utilisé pour
  le développement web.
- La programmation orientée objet (POO) est un paradigme puissant pour
  structurer le code.
- Les concepts avancés de la POO, tels que les interfaces, l'héritage et
  l'abstraction, permettent de créer des applications modulaires et
  maintenables.
- Utilisez les namespaces et l'autoloading pour organiser et gérer vos classes
  efficacement.

## Formulaires HTML et PDO, un rappel

- Éléments de base du monde web.
- Permettent de collecter des données utilisateur.
- Nécessitent une attention particulière en matière de validation et de
  sécurité.

![bg right:40%][illustration-formulaires-html-et-pdo-un-rappel]

### Structure d'un formulaire HTML (1/2)

- Utilisation de la balise `<form>`.
- L'action (`action`) définit où les données sont envoyées.
- La méthode (`method`) définit comment les données sont envoyées (`GET` ou
  `POST`).
- Champs de formulaire avec des balises `<input>`, `<select>`, etc.

![bg right:40%][illustration-formulaires-html-et-pdo-un-rappel]

### Structure d'un formulaire HTML (2/2)

<!-- _class: lead -->

Pour voir l'exemple complet, se référer au fichier
[`01-simple-form.php`](./snippets/01-simple-form.php).

### Récupération des données côté serveur

### Validation côté serveur

### Conservation des données en cas d'erreurs

### Connexion à une base de données SQLite avec PDO

### Nettoyage des données et persistance avec les requêtes préparées

### Affichage sécurisé des données

### Validation côté client

## Bases de données et PDO (avancé)

### MySQL/MariaDB

### Accéder à MySQL/MariaDB avec MAMP et Visual Studio Code

### Gestion des erreurs avec les exceptions

### Fichiers de configuration

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## À vous de jouer !

- (Re)lire le support de cours.
- Explorer les exemples de code.
- Faire les exercices.
- Poser des questions si nécessaire.

➡️ [Lien vers le cours][cours]

**N'hésitez pas à vous entraidez si vous avez des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources (1/2)

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/j6brni7fpvs)
- [Illustration][illustration-formulaires-html-et-pdo-un-rappel] par
  [Kelly Sikkema](https://unsplash.com/@kellysikkema) sur
  [Unsplash](https://unsplash.com/photos/stack-of-papers-flat-lay-photography-tQQ4BwN_UFs)

---

- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[cours]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/02.01-bases-de-donnees-et-pdo-avance
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-formulaires-html-et-pdo-un-rappel]:
	https://images.unsplash.com/photo-1554224155-1696413565d3?fit=crop&h=720

---

[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
