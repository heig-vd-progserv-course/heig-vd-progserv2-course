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

## Formulaires HTML et PDO, un rappel

- Éléments de base du monde web.
- Permettent de collecter des données utilisateur.
- Nécessitent une attention particulière en matière de validation et de
  sécurité.

![bg right:40%][illustration-formulaires-html-et-pdo-un-rappel]

### Structure d'un formulaire HTML

- Utilisation de la balise `<form>`.
- L'action (`action`) définit où les données sont envoyées.
- La méthode (`method`) définit comment les données sont envoyées (`GET` ou
  `POST`).
- Analysons l'exemple
  [`01-simple-form.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/01-simple-form.php).

![bg vertical][illustration-methode] ![bg right:40%][illustration-url-daction]

### Récupération des données côté serveur

- Les données des formulaires sont accessibles via les superglobales `$_GET` et
  `$_POST`.
- Analysons l'exemple
  [`02-get-data-server-side.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/02-get-data-server-side.php).

![bg right:40%][illustration-methode]

### Validation côté serveur

- Valider les données permet de garantir leur intégrité et sécurité.
- Utiliser des filtres et des expressions régulières pour valider les données.
- Analysons l'exemple
  [`03-validate-data-server-side.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/03-validate-data-server-side.php).

![bg right:40%][illustration-validation-cote-serveur]

### Conservation des données en cas d'erreurs

- Par défaut, les données saisies sont perdues une fois soumises.
- Il est possible de conserver les données saisies en cas d'erreurs de
  validation.
- Analysons l'exemple
  [`04-keep-data-on-errors.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/04-keep-data-on-errors.php).

![bg right:40%][illustration-sauvegarde-des-donnees-saisies]

### Connexion à une base de données SQLite avec PDO

- PDO (PHP Data Objects) est une extension PHP pour accéder aux bases de données
  (SQLite, MySQL, Postgres, etc.).
- Analysons l'exemple
  [`05-pdo-and-sqlite.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/05-pdo-and-sqlite.php).

![bg right:40% w:80%](https://www.sqlite.org/images/sqlite370_banner.svg)

### Nettoyage des données et persistance avec les requêtes préparées

- Nettoyer les données évite les vulnérabilités par injections SQL.
- PDO met à disposition les requêtes préparées.
- Analysons l'exemple
  [`05-pdo-and-sqlite.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/05-pdo-and-sqlite.php).

![bg right:40%][illustration-nettoyage-des-donnees-et-persistence-avec-les-requetes-preparees]

### Affichage sécurisé des données

- Pour éviter les attaques XSS, il est important d'échapper les caractères
  spéciaux lors de l'affichage des données utilisateur.
- La fonction `htmlspecialchars()` permet d'échapper ces caractères.
- Analysons l'exemple
  [`06-escape-special-characters.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/06-escape-special-characters.php).

![bg right:40%][illustration-affichage-securise-des-donnees]

### Validation côté client

- Améliore l'expérience utilisateur.
- **Ne remplace pas la validation côté serveur.**
- Repose sur les attributs HTML (`required`, `type`, `min`, etc.).
- Analysons l'exemple
  [`07-validate-data-client-side.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/07-validate-data-client-side.php).

![bg right:40% vertical][illustration-cote-client]

## Bases de données et PDO (avancé)

- Dans un environnement de production, SQLite n'est pas toujours adapté.
- MySQL/MariaDB est un système de gestion de base de données (SGBD) plus
  robuste.
- Nous allons voir comment utiliser MySQL/MariaDB avec PDO.

![bg right:40%][illustration-bases-de-donnees-et-pdo-avance]

### MySQL/MariaDB

- Bases de données relationnelles.
- MariaDB est un fork (= un clone) de MySQL.
- Les deux offrent les mêmes fonctionnalités de base.
- PDO permet d'interagir avec MySQL/MariaDB.
- Analysons l'exemple
  [`08-mysql-with-constants.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/08-mysql-with-constants.php).

![bg right:40% w:80%](https://upload.wikimedia.org/wikipedia/fr/6/62/MySQL.svg)
![bg vertical w:80%](https://mariadb.com/wp-content/uploads/2019/11/mariadb-horizontal-blue.svg)

### Accéder à MySQL/MariaDB avec MAMP et Visual Studio Code (1/2)

- Une base de données MySQL est accessible via MAMP.
- L'utilisateur par défaut est `root`, sans mot de passe.

![bg right:40% w:80%](https://upload.wikimedia.org/wikipedia/fr/6/62/MySQL.svg)
![bg vertical w:80%](https://mariadb.com/wp-content/uploads/2019/11/mariadb-horizontal-blue.svg)

### Accéder à MySQL/MariaDB avec MAMP et Visual Studio Code (2/2)

- Pour accéder à la base de données, utilisez:
  - [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)
  - Visual Studio Code avec
    [Database Client](https://marketplace.visualstudio.com/items?itemName=cweijan.vscode-database-client2).

![bg right:40% w:80%](https://upload.wikimedia.org/wikipedia/fr/6/62/MySQL.svg)
![bg vertical w:80%](https://mariadb.com/wp-content/uploads/2019/11/mariadb-horizontal-blue.svg)

### Gestion des erreurs avec les exceptions (1/3)

- Lors de la connexion à la base de données ou de l'exécution de requêtes, des
  erreurs peuvent survenir.
- Lorsqu'une erreur survient, PDO lance une exception.
- Une exception est un objet qui représente une erreur.
- Une exception peut être "jetée" (throw) lorsqu'une erreur se produit, et elle
  peut être "attrapée" (catch) dans un bloc `try-catch` pour gérer l'erreur de
  manière appropriée.
- Une exception non gérée provoque l'arrêt de l'application.

### Gestion des erreurs avec les exceptions (2/3)

- Ce qui est dans le bloc `try` peut lever une exception. Si une exception est
  levée, le code dans le bloc `catch` est exécuté.

```php
try {
    // Code qui peut générer une exception
    throw new Exception("Une erreur s'est produite.");
} catch (Exception $e) {
    // Gestion de l'exception
    echo "Une exception a été capturée : " . $e->getMessage();
}
```

### Gestion des erreurs avec les exceptions (3/3)

- Analysons l'exemple
  [`09-handle-exceptions.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/09-handle-exceptions.php).

![bg right:40%][illustration-gestion-des-erreurs-avec-les-exceptions]

### Fichiers de configuration (1/2)

- Stocker les paramètres de connexion dans le code source n'est pas recommandé.
- Utiliser un fichier de configuration pour les paramètres de connexion.
- Attention à la sécurité : le fichier de configuration ne doit pas être
  accessible publiquement.

![bg right:40%][illustration-formulaires-html-et-pdo-un-rappel]

### Fichiers de configuration (2/2)

- Analysons l'exemple
  [`10-database-configuration-file.php`](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/02.01-bases-de-donnees-et-pdo-avance/01-supports-de-cours/snippets/10-database-configuration-file.php).

![bg right:40%][illustration-formulaires-html-et-pdo-un-rappel]

## Conclusion

- PDO permet d'interagir avec différentes bases de données.
- MySQL/MariaDB est un SGBD robuste pour les applications en production.
- La gestion des erreurs avec les exceptions améliore la robustesse du code.
- Utiliser des fichiers de configuration pour une meilleure gestion des
  paramètres.
- Toujours valider et nettoyer les données utilisateur issues des formulaires
  pour des raisons de sécurité.

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
- [Illustration][illustration-methode] par
  [Anastasiia Nelen](https://unsplash.com/@mnelen) sur
  [Unsplash](https://unsplash.com/photos/a-blue-and-white-box-SAHWzVB3bcc)
- [Illustration][illustration-url-daction] par
  [Shavr IK](https://unsplash.com/@shavr) sur
  [Unsplash](https://unsplash.com/photos/a-close-up-of-a-control-panel-with-buttons-r6fBLCriUgg)
- [Illustration][illustration-validation-cote-serveur] par
  [Taylor Vick](https://unsplash.com/@tvick) sur
  [Unsplash](https://unsplash.com/photos/cable-network-M5tzZtFCOfs)
- [Illustration][illustration-sauvegarde-des-donnees-saisies] par
  [Kelly Sikkema](https://unsplash.com/@kellysikkema) sur
  [Unsplash](https://unsplash.com/photos/white-and-black-board-SkFdmKGxQ44)

## Sources (2/2)

- [Illustration][illustration-nettoyage-des-donnees-et-persistence-avec-les-requetes-preparees]
  par [Jan Antonin Kolar](https://unsplash.com/@jankolar) sur
  [Unsplash](https://unsplash.com/photos/brown-wooden-drawer-lRoX0shwjUQ)
- [Illustration][illustration-affichage-securise-des-donnees] par
  [Towfiqu barbhuiya](https://unsplash.com/@towfiqu999999) sur
  [Unsplash](https://unsplash.com/photos/person-holding-white-ceramic-mug-ho-p7qLBewk)
- [Illustration][illustration-cote-client] par
  [Blake Wisz](https://unsplash.com/@blakewisz) sur
  [Unsplash](https://unsplash.com/photos/turned-on-monitor-tE6th1h6Bfk)
- [Illustration][illustration-bases-de-donnees-et-pdo-avance] par
  [Sunder Muthukumaran](https://unsplash.com/@sunder_2k25) sur
  [Unsplash](https://unsplash.com/photos/a-stack-of-stacked-blue-and-white-plates-n7eJHQwefeI)
- [Illustration][illustration-gestion-des-erreurs-avec-les-exceptions] par
  [Sigmund](https://unsplash.com/@sigmund) sur
  [Unsplash](https://unsplash.com/photos/black-digital-device-at-0-00-By-tZImt0Ms)
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
[illustration-methode]:
	https://images.unsplash.com/photo-1659896975336-3f3f989d3396?fit=crop&h=720
[illustration-url-daction]:
	https://images.unsplash.com/photo-1720036237584-7fd0f37db499?fit=crop&h=720
[illustration-validation-cote-serveur]:
	https://images.unsplash.com/photo-1558494949-ef010cbdcc31?fit=crop&h=720
[illustration-sauvegarde-des-donnees-saisies]:
	https://images.unsplash.com/photo-1554252116-ed7971ea7623?fit=crop&h=720
[illustration-nettoyage-des-donnees-et-persistence-avec-les-requetes-preparees]:
	https://images.unsplash.com/photo-1544383835-bda2bc66a55d?fit=crop&h=720
[illustration-affichage-securise-des-donnees]:
	https://images.unsplash.com/photo-1628177142898-93e36e4e3a50?fit=crop&h=720
[illustration-cote-client]:
	https://images.unsplash.com/photo-1556740738-b6a63e27c4df?fit=crop&h=720
[illustration-bases-de-donnees-et-pdo-avance]:
	https://images.unsplash.com/photo-1633412802994-5c058f151b66?fit=crop&h=720
[illustration-gestion-des-erreurs-avec-les-exceptions]:
	https://images.unsplash.com/photo-1579373903781-fd5c0c30c4cd?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
