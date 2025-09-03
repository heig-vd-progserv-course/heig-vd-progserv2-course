---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Projet libre
description: Projet libre pour l'unité d'enseignement ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-ProgServ2-course/01.01-modalites-de-lunite-denseignement/01-supports-de-cours/index.html
header: "**Projet libre**"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Projet libre

<!--
_class: lead
_paginate: false
-->

[Lien vers le cours][course]

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## Bienvenue à l'unité d'enseignement Programmation serveur 1 (ProgServ2) !

<!-- _class: lead -->

## Qui suis-je

<div class="center">

<img src="https://avatars.githubusercontent.com/u/5037444?v=4" alt="Ludovic Delafontaine" width="200" class="rounded">

**Ludovic Delafontaine**  
[E-mail](mailto:ludovic.delafontaine@heig-vd.ch) ·
[GitHub](https://github.com/ludelafo)

</div>

## Mes objectifs et souhaits pour ProgServ2

PHP va vous accompagner tout au long de vos études à la HEIG-VD (ProgServ2,
ProgServ2, DevProdMed, etc.) et aussi plus tard dans votre vie professionnelle.

Mon objectif est de vous donner des bases solides et une bonne compréhension de
ce language pour vos études et pour la suite.

Si quelque chose ne convient pas dans mon cours, n'hésitez pas à me le dire. Je
suis ouvert à toutes critiques pour améliorer mon enseignement.

## Comment me contacter

Selon vos préférences, vous pouvez utiliser l'un des canaux suivants pour toutes
questions relatives à l'unité d'enseignement :

- En personne, durant les sessions de cours ou en dehors
- Par e-mail
  ([ludovic.delafontaine@heig-vd.ch](mailto:ludovic.delafontaine@heig-vd.ch))
- Microsoft Teams
  - Dans le canal Teams de l'unité d'enseignement (de préférence - n'hésitez pas
    à vous entraider si je ne suis pas disponible)
  - Message privé sur Teams (à éviter si possible)

## _Retrouvez plus de détails dans le support de cours_

<!-- _class: lead -->

_Cette présentation est un résumé du support de cours. Pour plus de détails,
consultez le [support de cours][course-material]._

## Objectifs (1/3)

- Lister les objectifs de l'unité d'enseignement
- Lister les modalités d'organisation de l'unité d'enseignement
- Lister les modalités d'évaluation
- Expliquer le concept d'architecture client-serveur
- Lister les outils nécessaires pour écrire et exécuter du code PHP

![bg right:40%][illustration-objectifs]

## Objectifs (2/3)

- Expliquer comment PHP fonctionne dans un environnement web
- Expliquer la syntaxe de base de PHP
- Expliquer les variables en PHP
- Expliquer les constantes en PHP
- Expliquer la nature dynamique des variables et constantes en PHP
- Expliquer les opérateurs en PHP

![bg right:40%][illustration-objectifs]

## Objectifs (3/3)

- Expliquer les structures de contrôle conditionnelles en PHP
- Rédiger du code PHP simple

![bg right:40%][illustration-objectifs]

## Modalités de l'unité d'enseignement

<!-- _class: lead -->

### Objectifs de l'unité d'enseignement (1/2)

Selon la
[fiche d'unité](https://gaps.heig-vd.ch/consultation/fiches/uv/uv.php?id=7307),
à la fin de cette unité d'enseignement, vous devriez être capable de :

> - Connaître les principes de base de la programmation serveur
> - Manipuler des tableaux associatifs complexes
> - Générer des documents Web dynamiquement
> - Gérer la persistance des données applicatives dans un Système de Gestion de
>   Base de Données (SGBD)

### Objectifs de l'unité d'enseignement (2/2)

En résumé, vous devriez être capable de :

- Comprendre les bases de PHP et son rôle dans le monde web.
- Écrire un code PHP propre et organisé.
- Gérer les formulaires HTML et les données qu'ils contiennent.
- Persister des données dans une base de données SQLite.
- Implémenter les mécanismes de base de la sécurité web.
- Implémenter des concepts de base de la programmation orientée objet.

---

<!-- _class: lead -->

Grâce à ces compétences, la personne qui étudie sera en mesure de développer des
applications web simples pour gérer une collection de données (par exemple, un
carnet d'adresses, un gestionnaire de tâches, sa liste favorite de jeux vidéo,
etc.).

### Modalités d'organisation de l'unité d'enseignement

- En présentiel chaque semaine dans cette même salle.
- Mélange de théorie et de pratique pour un meilleur apprentissage :
  - Moment de théorie court pour expliquer les concepts.
  - Mini-projet à réaliser tout au long de l'unité d'enseignement.
  - Exercices à faire en classe ou à la maison.
- Espace de discussion pour poser des questions et obtenir de l'aide (**il n'y a
  pas de questions bêtes !**, je suis payé pour ça).

### Modalités d'évaluation

Le cours sera évalué à l'aide d'un seul examen final composé de deux parties, à
effectuer sur ordinateur :

- Partie théorique
  - 40% de la note finale
- Partie pratique
  - 60% de la note finale

![bg right:40%][illustration-modalites-devaluation]

#### Partie théorique

- Évaluation sur :
  - Les connaissances théoriques acquises tout au long de l'unité d'enseignement
  - Les exercices
- Durée d'environ 45 minutes
- Devrait utiliser la plateforme d'évaluation en ligne de la HEIG-VD
- **Aucune aide autorisée**

![bg right:40%][illustration-modalites-devaluation]

#### Partie pratique

- Évaluation sur :
  - Les exercices
  - Le mini-projet
- Durée d'environ 2h15
- Petit projet à réaliser
- Contenus du cours, notes personnelles,
  [php.net](https://www.php.net/manual/index.php) et
  [developer.mozilla.org](https://developer.mozilla.org) autorisés
- **Toute autre aide interdite**

![bg right:40%][illustration-modalites-devaluation]

### La programmation et l'anglais

Le domaine de la programmation est très largement anglophone. La majorité des
ressources que vous trouverez dans votre carrière sont en anglais.

Dans le but de vous préparer à cette réalité, les exemples de code que nous
utiliserons dans les cours seront en anglais (commentaires en français par
contre).

Le reste du cours restera néanmoins en français. Si l'anglais est une barrière
pour vous, n'hésitez pas à me le faire savoir.

### Bibliographie et ressources utilisées

- <https://www.php.net/manual/index.php>
- <https://developer.mozilla.org>
- <https://phptherightway.com/>
- <https://www.w3schools.com/php/>
- <https://github.com/ziadoz/awesome-php>

![bg right:40%][illustration-bibliographie-et-ressources]

## Introduction à PHP

<!-- _class: lead -->

### Qu'est-ce que PHP (1/2)

- Jusqu'ici, vous avez développé des applications Java qui s'exécutent sur une
  seule machine.
- Avec PHP, plusieurs personnes vont pouvoir accéder à une application depuis
  leur navigateur web.

![bg right:40%][illustration-quest-ce-php]

### Qu'est-ce que PHP (2/2)

- PHP est un language de programmation datant de 1994.
- Très utilisé pour le développement web.
- Basé sur une architecture client-serveur.
- Actuellement à la version 8.4.
- Un des languages les plus utilisés pour le développement web.

![bg right:40%][illustration-principale]

### Applications web et architecture client-serveur

- La plupart des applications web modernes reposent sur une architecture dite
  _"client-serveur"_ :
  1. Un client (navigateur web) envoie une requête à un serveur.
  2. Le serveur répond aux requêtes des différents clients.
  3. Le client affiche le résultat de la requête.
- PHP repose sur cette même architecture.

### Comment fonctionne PHP

- PHP fonctionne grâce aux outils suivants :
  - Un serveur web.
  - PHP installé sur le serveur web.
  - Un navigateur web.
  - Un éditeur de code (pour le développement).

![bg right:40% contain](./images/architecture-client-serveur-avec-php.png)

### Comment écrire du code PHP (1/3)

- Code PHP dans un fichier `.php`.
- Le code PHP est écrit entre des balises `<?php` et `?>`.
- Le code PHP peut être mélangé avec du HTML.
- Uniquement `<?php` s'il n'y a que du code PHP.

![bg right:40%][illustration-comment-ecrire-du-code-php]

### Comment écrire du code PHP (2/3)

```php
<?php
// Code PHP, dans un fichier `.php`
// Ici, il n'y a pas de balise de fermeture PHP
echo "Hello, World!";
```

```java
// Équivalent en Java
public class Main {
    public static void main(String[] args) {
        System.out.println("Hello, World!");
    }
}
```

### Comment écrire du code PHP (3/3)

```php
<!-- Code PHP, dans un fichier `.php` avec de l'HTML -->
<!-- Il y a la balise de fermeture PHP -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP Test</title>
</head>
<body>
    <h1><?php echo "Hello, World!"; ?></h1>
</body>
</html>
```

### Comment exécuter du code PHP

- Il faut avoir un serveur web avec PHP installé sur votre machine
- Heureusement, il existe des solutions toutes faites pour cela :
  - [WampServer](https://www.wampserver.com/)
  - [MAMP](https://www.mamp.info/)
  - [XAMPP](https://www.apachefriends.org/index.html)

![bg right:40%][illustration-comment-executer-du-code-php]

### Syntaxe de base de PHP

- Similaire à Java, JavaScript et d'autres languages de programmation.
- Comme n'importe quelle langue ou language de programmation, PHP a ses propres
  règles de syntaxe.
- Il s'agit de les apprendre et de les comprendre pour lire et écrire du code
  PHP de manière efficace.

![bg right:40%][illustration-comment-ecrire-du-code-php]

#### Les commentaires

- Comme dans Java, `//` pour un commentaire sur une seule ligne
- Comme dans Java, `/* ... */` pour un commentaire sur plusieurs lignes

```php
<?php
// Ceci est un commentaire sur une seule ligne

/*
Ceci est un commentaire
sur plusieurs lignes
*/
```

#### Les variables (1/3)

- Les variables sont des conteneurs pour stocker des données.
- Les variables sont déclarées avec le signe `$`.
- Les variables peuvent contenir des chaînes de caractères, des nombres, des
  booléens, des tableaux, etc.

![bg right:40%][illustration-les-variables]

#### Les variables (2/3)

```php
<?php
// Déclaration d'une variable - une variable commence par le signe `$`
$variable = "Hello, World!";

// Affichage de la variable
echo $variable;

// Modification de la variable
$variable = "Goodbye, World!";

// Affichage de la variable modifiée
echo $variable;
```

#### Les variables (3/3)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Déclaration d'une variable
    String variable = "Hello, World!";

    // Affichage de la variable
    System.out.print(variable);

    // Modification de la variable
    variable = "Goodbye, World!";

    // Affichage de la variable modifiée
    System.out.print(variable);
}
```

##### Type de données et typage dynamique (1/3)

- PHP est un language de programmation à typage dynamique.
- Il n'y a pas besoin de déclarer le type de données d'une variable.
- Le type de données d'une variable est déterminé par la valeur qui lui est
  assignée.

![bg right:40%][illustration-type-de-donnees-et-typage-dynamique]

##### Type de données et typage dynamique (2/3)

```php
<?php
// Variable de type chaîne de caractères
$variable = "Hello, World!";

// Variable de type nombre
$variable = 42;

// Variable de type nombre flottant
$variable = 3.14;

// Variable de type booléen
$variable = true;
```

##### Type de données et typage dynamique (3/3)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Variable de type chaîne de caractères
    String variable1 = "Hello, World!";

    // Variable de type nombre
    int variable2 = 42;

    // Variable de type nombre flottant
    double variable3 = 3.14;

    // Variable de type booléen
    boolean variable4 = true;
}
```

##### Les chaînes de caractères (1/3)

- Les chaînes de caractères sont déclarées entre des guillemets simples (`'`) ou
  doubles (`"`).
- Permettent de créer des mots ou des phrases.
- Pour concaténer des chaînes de caractères, on utilise le point (`.`).

![bg right:40%][illustration-les-chaines-de-caracteres]

##### Les chaînes de caractères (2/3)

```php
<?php
$string = "Hello, World!";

echo $string;
```

```java
// Équivalent en Java
public static void main(String[] args) {
    String string = "Hello, World!";

    System.out.print(string);
}
```

##### Les chaînes de caractères (3/3)

```php
<?php
$first = "Hello, ";
$second = "World!";

echo $first . $second;
```

```java
// Équivalent en Java
public static void main(String[] args) {
    String first = "Hello, ";
    String second = "World!";

    System.out.print(first + second);
}
```

##### Les nombres (1/3)

- Les nombres sont déclarés sans guillemets.
- Il existe deux types de nombres en PHP : les entiers et les flottants.
- Les entiers sont des nombres entiers positifs ou négatifs.
- Les flottants sont des nombres à virgule, eux aussi, positifs ou négatifs.

![bg right:40%][illustration-les-nombres]

##### Les nombres (2/3)

```php
<?php
// Entier
$integer = 42;

// Flottant
$float = 3.14;

// Affichage des nombres
echo "\$integer contains $integer<br>";
echo "\$float contains $float";
```

##### Les nombres (3/3)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Entier
    int myInteger = 42;

    // Flottant
    double myFloat = 3.14;

    // Affichage des nombres
    System.out.println("myInteger contains " + myInteger);
    System.out.print("myFloat contains " + myFloat);
}
```

##### Les booléens (1/3)

- Les booléens sont des valeurs qui peuvent être soit vraies (`true`) soit
  fausses (`false`).
- Les booléens sont déclarés en PHP avec les mots-clés `true` et `false`.
- Les booléens sont souvent utilisés pour des conditions dans les structures de
  contrôle conditionnelles.

![bg right:40%][illustration-les-booleens]

##### Les booléens (2/3)

```php
<?php
// Vrai
$doILikeDogs = true;

// Faux
$doILikeHomework = false;

// Affichage des booléens - `false` est affiché comme une chaîne vide
echo "\$doILikeDogs contains $doILikeDogs<br>";
echo "\$doILikeHomework contains $doILikeHomework";
```

##### Les booléens (3/3)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Vrai
    boolean doILikeDogs = true;

    // Faux
    boolean doILikeHomework = false;

    // Affichage des booléens
    System.out.println("doILikeDogs contains " + doILikeDogs);
    System.out.print("doILikeHomework contains " + doILikeHomework);
}
```

##### Les tableaux (1/3)

- Les tableaux sont des collections de valeurs.
- Les tableaux sont déclarés entre des crochets (`[]`) ou avec la fonction
  `array()`.
- Les valeurs d'un tableau sont indexées à partir de 0.
- Nous étudierons les tableaux plus en détails dans un prochain cours.

![bg right:40%][illustration-les-tableaux]

##### Les tableaux (2/3)

```php
<?php
// Déclaration d'un tableau
$array = ["apple", "banana", "cherry"];

// Affichage de la première valeur du tableau
// Les tableaux sont indexés à partir de 0
echo "$array[0]<br>";

// Déclaration d'un tableau (alternative)
$array = array("apple", "banana", "cherry");

// Affichage de la troisième valeur du tableau
echo "$array[2]";
```

##### Les tableaux (3/3)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Déclaration d'un tableau
    String[] array = {"apple", "banana", "cherry"};

    // Affichage de la première valeur du tableau
    System.out.println(array[0]);

    // Affichage de la troisième valeur du tableau
    System.out.println(array[2]);
}
```

#### Les constantes (1/3)

- Les constantes sont des valeurs qui ne peuvent pas être modifiées.
- Les constantes sont déclarées avec le mot-clé `const` ou avec la fonction
  `define()`.
- La convention veut que les constantes soient écrites en majuscules.

![bg right:40%][illustration-les-constantes]

#### Les constantes (2/3)

```php
<?php
// Définition d'une constante
const CONSTANT = "Hello, World!";

// Affichage de la constante
echo CONSTANT;

// Tentative de modification de la constante (erreur)
CONSTANT = "Goodbye, World!";

// Définition d'une constante (alternative)
define("CONSTANT", "Hello, World!");
```

#### Les constantes (3/3)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Définition d'une constante
    final String CONSTANT = "Hello, World!";

    // Affichage de la constante
    System.out.println(CONSTANT);

    // Tentative de modification de la constante (erreur)
    CONSTANT = "Goodbye, World!";
}
```

#### Les opérateurs (1/5)

- Permet d'effectuer des opérations sur des variables et des valeurs.
- Opérateurs arithmétiques : `+`, `-`, `*`, `/`, `%` (modulo)
- Opérateurs de comparaison : `==` (égal), `!=` (différent), `>` (supérieur),
  `<` (inférieur)
- Opérateurs logiques : `&&` (et), `||` (ou), `!` (non/inversion)

![bg right:40%][illustration-les-operateurs]

#### Les opérateurs (2/5)

```php
<?php
$sum = 1 + 1; // `$sum` contiendra 2
$difference = $sum - 1; // `$difference` contiendra 1
$product = 2 * 2; // `$product` contiendra 4
$quotient = $product / 2; // `$quotient` contiendra 2

echo "Sum: $sum<br>";
echo "Difference: $difference<br>";
echo "Product: $product<br>";
echo "Quotient: $quotient";
```

#### Les opérateurs (3/5)

```java
// Équivalent en Java
public static void main(String[] args) {
    int sum = 1 + 1; // `sum` contiendra 2
    int difference = 2 - 1; // `difference` contiendra 1
    int product = 2 * 2; // `product` contiendra 4
    int quotient = 4 / 2; // `quotient` contiendra 2

    System.out.println("Sum: " + sum);
    System.out.println("Difference: " + difference);
    System.out.println("Product: " + product);
    System.out.print("Quotient: " + quotient);
}
```

#### Les opérateurs (4/5)

```php
<?php
// `$modulo` contiendra 1
// Il reste 1 après la division de 5 par 2, 5 n'est donc pas pair.
$modulo = 5 % 2;

echo "Modulo: $modulo<br>";

// `$modulo` contiendra 0
// Il ne reste rien après la division de 6 par 2, 6 est donc pair.
$modulo = 6 % 2;

echo "Modulo: $modulo";
```

#### Les opérateurs (5/5)

```java
// Équivalent en Java
public static void main(String[] args) {
    // `modulo` contiendra 1
    // Il reste 1 après la division de 5 par 2, 5 n'est donc pas pair.
    int modulo = 5 % 2;

    System.out.println("Modulo: " + modulo);

    // `modulo` contiendra 0
    // Il ne reste rien après la division de 6 par 2, 6 est donc pair.
    modulo = 6 % 2;

    System.out.print("Modulo: " + modulo);
}
```

#### Les structures de contrôle conditionnelles (1/7)

- Permettent de contrôler le flux d'exécution d'un programme.
- Utilisent les opérateurs de comparaison et logiques.
- Elles se composent de `if`, `else`, `elseif` et `switch`.

![bg right:40%][illustration-les-structures-de-controle-conditionnelles]

#### Les structures de contrôle conditionnelles (2/7)

```php
<?php
$a = 1;
$b = 2;

if ($a < $b) {
    echo "a is less than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is greater than b";
}
```

#### Les structures de contrôle conditionnelles (3/7)

```java
// Équivalent en Java
public static void main(String[] args) {
    int a = 1;
    int b = 2;

    if (a < b) {
        System.out.print("a is less than b");
    } else if (a == b) {
        System.out.print("a is equal to b");
    } else {
        System.out.print("a is greater than b");
    }
}
```

#### Les structures de contrôle conditionnelles (4/7)

```php
<?php
// Déclaration de deux variables
$age = 18;
$country = "Switzerland";

// Vérification si `$age` est supérieur ou égal à 18
// et si `$country` est égal à "Switzerland"
if ($age >= 18 && $country == "Switzerland") {
    echo "You are allowed to vote in Switzerland.";
}
```

#### Les structures de contrôle conditionnelles (5/7)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Déclaration de deux variables
    int age = 18;
    String country = "Switzerland";

    // Vérification si `$age` est supérieur ou égal à 18
    // et si `$country` est égal à "Switzerland"
    if (age >= 18 && country.equals("Switzerland")) {
        System.out.print("You are allowed to vote in Switzerland.");
    }
}
```

#### Les structures de contrôle conditionnelles (6/7)

```php
<?php
// Déclaration d'une variable
$color = "red";

// Vérification de la variable `$color`
switch ($color) {
    // Si la variable `$color` est égale à "red"
    case "red":
        echo "The color is red.";
        break;
```

---

```php
    // Si la variable `$color` est égale à "blue"
    case "blue":
        echo "The color is blue.";
        break;
    // Par défaut
    default:
        echo "The color is neither red nor blue.";
}
```

#### Les structures de contrôle conditionnelles (7/7)

```java
// Équivalent en Java
public static void main(String[] args) {
    // Déclaration d'une variable
    String color = "red";

    // Vérification de la variable `$color`
    switch (color) {
        // Si la variable `$color` est égale à "red"
        case "red":
            System.out.println("The color is red.");
            break;
```

---

```java
        // Si la variable `$color` est égale à "blue"
        case "blue":
            System.out.println("The color is blue.");
            break;
        // Par défaut
        default:
            System.out.println("The color is neither red nor blue.");
    }
}
```

## Conclusion

- PHP est un language de programmation très utilisé pour le développement web
- PHP repose sur une architecture client-serveur
- PHP est un language de programmation simple à prendre en main (il suffit de
  modifier le code, rafraîchir la page et le tour est joué)

![bg right:40%][illustration-principale]

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## Mini-projet

<!-- _class: lead -->

### Mini-projet

- Application web en PHP pour gérer des animaux de compagnie (ajout,
  visualisation, modification, suppression)
- Permet de mettre en pratique le contenu théorique du cours.
- À réaliser tout au long de l'unité d'enseignement de façon guidée.
- Je suis là pour vous aider si besoin.

![bg right:40% brightness:1.3][illustration-mini-projet]

## Exercices

<!-- _class: lead -->

### Exercices

- Permet d'exercer les concepts vus en cours, autant théoriques que pratiques.

![bg right:40%][illustration-exercices]

## À vous de jouer !

- (Re)lire le [support de cours][course-material].
- Réaliser le [mini-projet][mini-project].
- Faire les [exercices][exercices].
- Poser des questions si nécessaire.

\
**Pour le mini-projet ou les exercices, n'hésitez pas à vous entraidez si vous avez
des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources (1/3)

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/j6brni7fpvs)
- [Illustration][illustration-modalites-devaluation] par
  [Nguyen Dang Hoang Nhu](https://unsplash.com/@nguyendhn) sur
  [Unsplash](https://unsplash.com/photos/person-writing-on-white-paper-qDgTQOYk6B8)
- [Illustration][illustration-bibliographie-et-ressources] par
  [Tim van Cleef](https://unsplash.com/@_timvancleef) sur
  [Unsplash](https://unsplash.com/photos/wooden-ladder-by-bookshelves-1JBOZwuW7sI)
- [Illustration][illustration-quest-ce-php] par
  [Michiel Leunens](https://unsplash.com/@leunesmedia) sur
  [Unsplash](https://unsplash.com/photos/white-ceramic-cup-on-silver-coffee-maker-fBB7FeS4Xas)
- [Illustration][illustration-comment-executer-du-code-php] par
  [Taylor Vick](https://unsplash.com/@tvick) sur
  [Unsplash](https://unsplash.com/photos/cable-network-M5tzZtFCOfs)
- [Illustration][illustration-comment-ecrire-du-code-php] par
  [Aaron Burden](https://unsplash.com/@aaronburden) sur
  [Unsplash](https://unsplash.com/photos/fountain-pen-on-black-lined-paper-y02jEX_B0O0)
- [Illustration][illustration-les-variables] par
  [Fejuz](https://unsplash.com/@fejuz) sur
  [Unsplash](https://unsplash.com/photos/a-large-amount-of-containers-are-stacked-on-top-of-each-other-q6j5mSRpi50)

## Sources (2/3)

- [Illustration][illustration-type-de-donnees-et-typage-dynamique] par
  [Jan Huber](https://unsplash.com/@jan_huber) sur
  [Unsplash](https://unsplash.com/photos/yellow-and-red-light-streaks-NjV34SrbM_g)
- [Illustration][illustration-les-chaines-de-caracteres] par
  [Kier in Sight Archives](https://unsplash.com/@kierinsightarchives) sur
  [Unsplash](https://unsplash.com/photos/white-and-black-abstract-illustration-qXA4b_dZSbQ)
- [Illustration][illustration-les-nombres] par
  [Nick Hillier](https://unsplash.com/@nhillier) sur
  [Unsplash](https://unsplash.com/photos/assorted-numbers-photography-yD5rv8_WzxA)
- [Illustration][illustration-les-booleens] par
  [Brooke Lark](https://unsplash.com/@brookelark) sur
  [Unsplash](https://unsplash.com/photos/person-holding-calendar-at-january-BRBjShcA8D4)
- [Illustration][illustration-les-tableaux] par
  [Faris Mohammed](https://unsplash.com/@pkmfaris) sur
  [Unsplash](https://unsplash.com/photos/assorted-color-marker-pens-PQinRWK1TgU)
- [Illustration][illustration-les-constantes] par
  [Kenny Eliason](https://unsplash.com/@neonbrand) sur
  [Unsplash](https://unsplash.com/photos/red-bricks-wall-XEsx2NVpqWY)
- [Illustration][illustration-les-operateurs] par
  [charlesdeluvio](https://unsplash.com/@charlesdeluvio) sur
  [Unsplash](https://unsplash.com/photos/white-calculator-on-white-table-GlavtG-umzE)
- [Illustration][illustration-les-structures-de-controle-conditionnelles] par
  [Arham Jain](https://unsplash.com/@arham_jain48) sur
  [Unsplash](https://unsplash.com/photos/a-painting-of-blue-flowers-on-a-white-background-OkiDTYxLo34)

## Sources (3/3)

- [Illustration][illustration-mini-projet] par
  [Alec Favale](https://unsplash.com/@alecfavale) sur
  [Unsplash](https://unsplash.com/photos/short-coated-white-and-brown-puppy-Ivzo69e18nk)
- [Illustration][illustration-exercices] par
  [Samuel Girven](https://unsplash.com/@samuelgirven) sur
  [Unsplash](https://unsplash.com/photos/dumbbells-on-floor-VJ2s0c20qCo)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[presentation-web]:
	https://heig-vd-progserv-course.github.io/heig-vd-ProgServ2-course/01.01-modalites-de-lunite-denseignement/01-supports-de-cours/index.html
[presentation-pdf]:
	https://heig-vd-progserv-course.github.io/heig-vd-ProgServ2-course/01.01-modalites-de-lunite-denseignement/01-supports-de-cours/01-modalites-de-lunite-denseignement-et-introduction-a-php-presentation.pdf
[course-material]:
	https://github.com/heig-vd-progserv-course/heig-vd-ProgServ2-course/blob/main/01.01-modalites-de-lunite-denseignement/01-supports-de-cours/README.md
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-ProgServ2-course/blob/main/LICENSE.md
[mini-project]:
	https://github.com/heig-vd-progserv-course/heig-vd-ProgServ2-course/blob/main/01-modalites-de-lunite-denseignement-et-introduction-a-php/02-mini-project/README.md
[exercices]:
	https://github.com/heig-vd-progserv-course/heig-vd-ProgServ2-course/blob/main/01-modalites-de-lunite-denseignement-et-introduction-a-php/03-exercices/README.md

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-modalites-devaluation]:
	https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?fit=crop&h=720
[illustration-bibliographie-et-ressources]:
	https://images.unsplash.com/photo-1554906493-4812e307243d?fit=crop&h=720
[illustration-quest-ce-php]:
	https://images.unsplash.com/photo-1585332889055-059af80a9b5f?fit=crop&h=720
[illustration-comment-executer-du-code-php]:
	https://images.unsplash.com/photo-1558494949-ef010cbdcc31?fit=crop&h=720
[illustration-comment-ecrire-du-code-php]:
	https://images.unsplash.com/photo-1455390582262-044cdead277a?fit=crop&h=720
[illustration-les-variables]:
	https://images.unsplash.com/photo-1634646809203-f3b4adff9127?fit=crop&h=720
[illustration-type-de-donnees-et-typage-dynamique]:
	https://images.unsplash.com/photo-1604012164853-9bb541fe0296?fit=crop&h=720
[illustration-les-chaines-de-caracteres]:
	https://images.unsplash.com/photo-1622321786092-a3df1d448be1?fit=crop&h=720
[illustration-les-nombres]:
	https://images.unsplash.com/photo-1502570149819-b2260483d302?fit=crop&h=720
[illustration-les-booleens]:
	https://images.unsplash.com/photo-1484981184820-2e84ea0af397?fit=crop&h=720
[illustration-les-tableaux]:
	https://images.unsplash.com/photo-1561117089-3fb7c944887f?fit=crop&h=720
[illustration-les-constantes]:
	https://images.unsplash.com/photo-1495578942200-c5f5d2137def?fit=crop&h=720
[illustration-les-operateurs]:
	https://images.unsplash.com/photo-1587145820266-a5951ee6f620?fit=crop&h=720
[illustration-les-structures-de-controle-conditionnelles]:
	https://images.unsplash.com/photo-1590593162201-f67611a18b87?fit=crop&h=720
[illustration-mini-projet]:
	https://images.unsplash.com/photo-1563460716037-460a3ad24ba9?fit=crop&h=720
[illustration-exercices]:
	https://images.unsplash.com/photo-1576678927484-cc907957088c?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
